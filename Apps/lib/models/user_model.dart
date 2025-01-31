class User {
  final int id;
  final String name;
  final String email;
  final String role;
  final String? phone; // Ubah ke String? agar dapat menerima null
  final String? address;
  final String? photo;
  final String? gender;
  final String createdAt;
  final String updatedAt;

  User({
    required this.id,
    required this.name,
    required this.email,
    required this.role,
    this.phone, // Tidak lagi required
    this.address,
    this.photo,
    this.gender,
    required this.createdAt,
    required this.updatedAt,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      id: json['id'],
      name: json['name'],
      email: json['email'],
      role: json['role'],
      phone: json['phone'], // Jika null, akan tetap aman dengan tipe String?
      address: json['address'],
      photo: json['photo'],
      gender: json['gender'],
      createdAt: json['created_at'],
      updatedAt: json['updated_at'],
    );
  }
}
