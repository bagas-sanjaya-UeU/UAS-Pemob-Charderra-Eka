class ApiResponse {
  final bool success;
  final String message;
  final String? token; // Tambahkan token sebagai nullable

  ApiResponse({
    required this.success,
    required this.message,
    this.token,
  });

  factory ApiResponse.fromJson(Map<String, dynamic> json) {
    return ApiResponse(
      success: json['success'] ?? false,
      message: json['message'] ?? '',
      token: json['token'], // Jika token tidak ada, ini akan jadi null
    );
  }
}
