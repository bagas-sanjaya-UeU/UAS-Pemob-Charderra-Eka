import 'package:get/get.dart';
import '../services/api_service.dart';
import '../models/donation_model.dart';

class DonationController extends GetxController {
  final ApiService _apiService = Get.find<ApiService>();
  var isLoading = false.obs;

  Future<void> submitDonation(Donation donation) async {
    try {
      isLoading(true);
      final response = await _apiService.submitDonation(donation);
      if (response['success'] == true) {
        Get.snackbar(
          'Berhasil',
          'Donasi berhasil disimpan.',
          snackPosition: SnackPosition.BOTTOM,
        );
        Get.offAllNamed('/home'); // Kembali ke halaman Home
      } else {
        Get.snackbar(
          'Gagal',
          'Gagal menyimpan donasi: ${response['message']}',
          snackPosition: SnackPosition.BOTTOM,
        );
      }
    } catch (e) {
      Get.snackbar(
        'Error',
        'Terjadi kesalahan: $e',
        snackPosition: SnackPosition.BOTTOM,
      );
    } finally {
      isLoading(false);
    }
  }
}
