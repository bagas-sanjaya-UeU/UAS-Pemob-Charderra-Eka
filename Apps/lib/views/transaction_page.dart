import 'package:flutter/material.dart';
import 'package:get/get.dart';
import '../controllers/donation_controller.dart';
import '../models/donation_model.dart';
import '../controllers/user_controller.dart';

class TransactionPage extends StatelessWidget {
  final int postId = Get.arguments['postId'];
  final String postTitle = Get.arguments['postTitle'];
  final DonationController controller = Get.put(DonationController());

  final TextEditingController nameController = TextEditingController();
  final TextEditingController amountController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Donasi untuk $postTitle'),
      ),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              'Form Donasi',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
            const SizedBox(height: 16),
            TextField(
              controller: nameController,
              decoration: const InputDecoration(
                labelText: 'Nama Anda',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 16),
            TextField(
              controller: amountController,
              keyboardType: TextInputType.number,
              decoration: const InputDecoration(
                labelText: 'Jumlah Donasi',
                border: OutlineInputBorder(),
              ),
            ),
            const SizedBox(height: 16),
            Obx(() {
              return ElevatedButton(
                onPressed: controller.isLoading.value
                    ? null
                    : () {
                        if (nameController.text.isEmpty ||
                            amountController.text.isEmpty) {
                          Get.snackbar(
                            'Error',
                            'Harap isi semua field.',
                            snackPosition: SnackPosition.BOTTOM,
                          );
                        } else {
                          final donation = Donation(
                            userId: Get.find<UserController>().user.value!.id,
                            postId: postId,
                            name: nameController.text,
                            amount: double.parse(amountController.text),
                          );
                          controller.submitDonation(donation);
                        }
                      },
                style: ElevatedButton.styleFrom(
                  minimumSize: const Size(double.infinity, 50),
                ),
                child: controller.isLoading.value
                    ? const CircularProgressIndicator(
                        color: Colors.white,
                      )
                    : const Text('Submit Donasi'),
              );
            }),
          ],
        ),
      ),
    );
  }
}
