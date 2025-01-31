import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'views/home_page.dart'; // Halaman Home Anda
import 'views/profile_page.dart'; // Halaman profil

class MainPage extends StatefulWidget {
  @override
  _MainPageState createState() => _MainPageState();
}

class _MainPageState extends State<MainPage> {
  int _currentIndex = 0; // Indeks untuk tab yang aktif

  // Daftar halaman/tab
  final List<Widget> _pages = [
    HomePage(), // Halaman Home
    ProfilePage(), // Halaman Profil
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: _pages[_currentIndex], // Menampilkan halaman sesuai tab aktif
      bottomNavigationBar: BottomNavigationBar(
        currentIndex: _currentIndex, // Indeks tab aktif
        onTap: (index) {
          setState(() {
            _currentIndex = index; // Ubah tab aktif
          });
        },
        items: const [
          BottomNavigationBarItem(
            icon: Icon(Icons.home),
            label: 'Home',
          ),
          BottomNavigationBarItem(
            icon: Icon(Icons.person),
            label: 'Profile',
          ),
        ],
      ),
    );
  }
}
