import 'package:get/get.dart';
import '../models/post_model.dart';
import '../services/api_service.dart';

class PostController extends GetxController {
  var posts = <Post>[].obs;
  var isLoading = true.obs;

  final ApiService apiService = Get.find<ApiService>();

  @override
  void onInit() {
    super.onInit();
    fetchPosts();
  }

  void fetchPosts() async {
    try {
      isLoading(true);
      final data = await apiService.getPosts();
      posts.value = data;
    } catch (e) {
      Get.snackbar('Error', 'Failed to fetch posts.');
    } finally {
      isLoading(false);
    }
  }
}
