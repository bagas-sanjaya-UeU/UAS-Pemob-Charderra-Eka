import 'dart:convert';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:http/http.dart' as http;
import '../models/api_response_model.dart';
import '../models/user_model.dart';
import '../views/login_page.dart';

import '../models/post_model.dart';
import '../models/donation_model.dart';

class ApiService extends GetxController {
  final String baseUrl =
      "https://pemob.charderra.me/api"; // Ganti dengan URL API Anda
  final storage = GetStorage();
  final token = ''.obs;
  final user_id = ''.obs;

  @override
  void onInit() {
    super.onInit();
    // Load token dari storage saat controller diinisialisasi
    final savedToken = storage.read('token');
    if (savedToken != null && savedToken is String) {
      token.value = savedToken;
    }
  }

  Future<ApiResponse> login(String email, String password) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/login'),
        headers: <String, String>{
          'Content-Type': 'application/json; charset=UTF-8',
        },
        body: jsonEncode(<String, String>{
          'email': email,
          'password': password,
        }),
      );

      if (response.statusCode == 200) {
        final responseData = json.decode(response.body);
        final apiResponse = ApiResponse.fromJson(responseData);

        if (apiResponse.success == true && apiResponse.token != null) {
          // Simpan token ke dalam state dan storage
          token.value = apiResponse.token!;
          storage.write('token', apiResponse.token);
          storage.write('user_id', responseData['user']['id']);
        }

        return apiResponse;
      } else {
        return ApiResponse(success: false, message: 'Error on login');
      }
    } catch (e) {
      return ApiResponse(
          success: false, message: 'Failed to connect to the server');
    }
  }

  Future<ApiResponse> register(
      String name, String email, String password, String phone) async {
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/register'),
        headers: <String, String>{
          'Content-Type': 'application/json; charset=UTF-8',
        },
        body: jsonEncode(<String, String>{
          'name': name,
          'email': email,
          'password': password,
          'phone': phone,
        }),
      );

      if (response.statusCode == 201) {
        final responseData = json.decode(response.body);
        final apiResponse = ApiResponse.fromJson(responseData);

        if (apiResponse.success == true && apiResponse.token != null) {
          // Simpan token ke dalam state dan storage
          token.value = apiResponse.token!;
          storage.write('token', apiResponse.token);
          storage.write('user_id', responseData['user']['id']);
        }

        return apiResponse;
      } else {
        return ApiResponse(success: false, message: 'Error on register');
      }
    } catch (e) {
      return ApiResponse(
          success: false, message: 'Failed to connect to the server');
    }
  }

  Future<User?> getUserData() async {
    final response = await http.get(
      Uri.parse('$baseUrl/user/${storage.read('user_id')}'),
      headers: <String, String>{
        'Content-Type': 'application/json; charset=UTF-8',
        'Authorization': 'Bearer ${token.value}',
      },
    );

    if (response.statusCode == 200) {
      final data = json.decode(response.body);

      if (data['data'] != null) {
        return User.fromJson(data['data']);
      } else {
        storage.remove('token');
        storage.remove('user_id');
        Get.offAll(() => LoginPage());
      }
    } else if (response.statusCode == 404) {
      // Jika token tidak valid, hapus token dari storage
      storage.remove('token');
      storage.remove('user_id');
      Get.offAll(() => LoginPage());
    } else {
      storage.remove('token');
      storage.remove('user_id');
      Get.offAll(() => LoginPage());
    }
  }

  Future<List<Post>> getPosts() async {
    try {
      final response = await http.get(
        Uri.parse('$baseUrl/posts'),
        headers: <String, String>{
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ${token.value}',
        },
      );

      if (response.statusCode == 200) {
        final List<dynamic> postData = json.decode(response.body)['data'];
        return postData.map((data) => Post.fromJson(data)).toList();
      } else {
        throw Exception('Failed to fetch posts: ${response.body}');
      }
    } catch (e) {
      throw Exception('Error fetching posts: $e');
    }
  }

  Future<Map<String, dynamic>> submitDonation(Donation donation) async {
    final token = storage.read('token'); // Ambil token dari storage
    try {
      final response = await http.post(
        Uri.parse('$baseUrl/donation'),
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: jsonEncode(donation.toJson()),
      );

      if (response.statusCode == 200 || response.statusCode == 201) {
        return json.decode(response.body);
      } else {
        return {'success': false, 'message': 'Failed to submit donation.'};
      }
    } catch (e) {
      throw Exception('Error submitting donation: $e');
    }
  }
}
