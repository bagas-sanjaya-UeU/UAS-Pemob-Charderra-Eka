import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';

import 'views/login_page.dart';
import 'main_page.dart'; // Bottom Navigation
import 'controllers/user_controller.dart';
import 'services/api_service.dart';

import 'views/home_page.dart';
import 'views/transaction_page.dart';

void main() async {
  WidgetsFlutterBinding.ensureInitialized();
  await GetStorage.init();

  // Lazy initialization untuk GetX Controllers
  Get.lazyPut(() => UserController());
  Get.lazyPut(() => ApiService());

  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    final box = GetStorage();
    final token = box.read('token');

    final user_id = box.read('user_id');
    print('Token: $token');

    return GetMaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'App Donasi Kita',
      initialRoute: token == null ? '/login' : '/main', // Ubah ke /main
      getPages: [
        GetPage(name: '/login', page: () => LoginPage()),
        GetPage(name: '/main', page: () => MainPage()), // Bottom Navigation

        GetPage(name: '/posts', page: () => HomePage()),
        GetPage(
          name: '/transaction',
          page: () => TransactionPage(),
        ),
      ],
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
    );
  }
}
