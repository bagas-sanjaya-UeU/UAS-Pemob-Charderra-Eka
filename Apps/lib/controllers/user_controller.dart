import 'package:get/get.dart';
import '../models/user_model.dart';
import '../services/api_service.dart';

class UserController extends GetxController {
  var user = Rxn<User>(); // Rxn berarti nullable observable
  final apiService = Get.put(
      ApiService()); // Pastikan ApiService sudah dipasang dengan Get.put(ApiService())

  @override
  void onInit() {
    super.onInit();
    fetchUserData();
  }

  void fetchUserData() async {
    User? fetchedUser = await apiService.getUserData();
    if (fetchedUser != null) {
      user.value = fetchedUser;
    } else {
      print('Failed to fetch user data');
    }
  }

  void updateUser(User updatedUser) {
    user.value = updatedUser;
  }

  void resetUserData() {
    user.value = null; // Reset data user
  }
}
