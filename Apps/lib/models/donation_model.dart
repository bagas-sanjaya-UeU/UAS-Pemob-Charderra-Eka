class Donation {
  final int userId;
  final int postId;
  final String name;
  final double amount;

  Donation({
    required this.userId,
    required this.postId,
    required this.name,
    required this.amount,
  });

  Map<String, dynamic> toJson() {
    return {
      'user_id': userId,
      'post_id': postId,
      'name': name,
      'amount': amount,
    };
  }
}
