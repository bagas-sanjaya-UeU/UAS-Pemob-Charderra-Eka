import 'package:flutter/material.dart';
import 'package:get/get.dart';
import '../services/api_service.dart';
import '../controllers/user_controller.dart';
import '../controllers/post_controller.dart';
import 'login_page.dart';
import 'package:get_storage/get_storage.dart';

class HomePage extends StatelessWidget {
  final storage = GetStorage();
  final UserController _userController = Get.put(UserController());
  final ApiService _apiService = Get.find<ApiService>();
  final PostController _postController = Get.put(PostController());

  HomePage({super.key});

  void _logout() {
    storage.remove('token');
    storage.remove('user_id');
    _userController.resetUserData();
    Get.offAll(() => LoginPage());
  }

  Future<void> _refreshData() async {
    _userController.fetchUserData();
    _postController.fetchPosts(); // Refresh data post
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Donasi Kita'),
        actions: [
          IconButton(
            icon: const Icon(Icons.logout),
            onPressed: _logout,
          ),
        ],
      ),
      body: Obx(() {
        final user = _userController.user.value;

        if (user == null) {
          return const Center(child: CircularProgressIndicator());
        }

        return RefreshIndicator(
          onRefresh: _refreshData,
          child: SingleChildScrollView(
            padding: const EdgeInsets.all(16.0),
            physics: const AlwaysScrollableScrollPhysics(),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                // Salam kepada user yang baru login
                Text(
                  'Selamat datang, ${user.name}!',
                  style: const TextStyle(
                    fontSize: 22,
                    fontWeight: FontWeight.bold,
                  ),
                ),
                const SizedBox(height: 16),

                // Daftar Postingan
                const Text(
                  'List Donasi',
                  style: TextStyle(fontSize: 18, fontWeight: FontWeight.bold),
                ),
                const SizedBox(height: 16),
                Obx(() {
                  if (_postController.isLoading.value) {
                    return const Center(child: CircularProgressIndicator());
                  } else if (_postController.posts.isEmpty) {
                    return const Center(child: Text('Tidak ada postingan.'));
                  } else {
                    return ListView.builder(
                      shrinkWrap: true,
                      physics: const NeverScrollableScrollPhysics(),
                      itemCount: _postController.posts.length,
                      itemBuilder: (context, index) {
                        final post = _postController.posts[index];
                        return Card(
                          margin: const EdgeInsets.only(bottom: 16),
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Image.network(
                                post.image,
                                height: 150,
                                width: double.infinity,
                                fit: BoxFit.cover,
                              ),
                              Padding(
                                padding: const EdgeInsets.all(8.0),
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Text(
                                      post.title,
                                      style: const TextStyle(
                                        fontSize: 18,
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                    const SizedBox(height: 4),
                                    Text(post.content),
                                    const SizedBox(height: 8),
                                    Row(
                                      mainAxisAlignment:
                                          MainAxisAlignment.spaceBetween,
                                      children: [
                                        Text(
                                          'Kategori: ${post.category}',
                                          style: const TextStyle(
                                              color: Colors.grey),
                                        ),
                                        ElevatedButton(
                                          onPressed: () {
                                            Get.toNamed('/transaction',
                                                arguments: {
                                                  'postId': post.id,
                                                  'postTitle': post.title,
                                                });
                                          },
                                          style: ElevatedButton.styleFrom(
                                            backgroundColor: Colors.green,
                                          ),
                                          child: const Text('Donasi'),
                                        ),
                                      ],
                                    ),
                                  ],
                                ),
                              ),
                            ],
                          ),
                        );
                      },
                    );
                  }
                }),
              ],
            ),
          ),
        );
      }),
    );
  }
}
