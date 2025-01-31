import 'package:flutter/material.dart';

class ProfilePage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Profile'),
      ),
      body: Center(
        // Nama NIM Anda
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Text(
              'Nama: Charderra Eka Bagas Sanjaya',
              style: TextStyle(fontSize: 20),
            ),
            Text(
              'NIM: 20210801088',
              style: TextStyle(fontSize: 20),
            ),
          ],
        ),
      ),
    );
  }
}
