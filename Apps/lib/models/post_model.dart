class Post {
  final int id;
  final String title;
  final String content;
  final String image;
  final String category;
  final String type;
  final String slug;
  final String createdAt;
  final String updatedAt;
  final PostUser user;

  Post({
    required this.id,
    required this.title,
    required this.content,
    required this.image,
    required this.category,
    required this.type,
    required this.slug,
    required this.createdAt,
    required this.updatedAt,
    required this.user,
  });

  factory Post.fromJson(Map<String, dynamic> json) {
    return Post(
      id: json['id'],
      title: json['title'],
      content: json['content'],
      image: json['image'],
      category: json['category'],
      type: json['type'],
      slug: json['slug'],
      createdAt: json['created_at'],
      updatedAt: json['updated_at'],
      user: PostUser.fromJson(json['user']),
    );
  }
}

class PostUser {
  final int id;
  final String name;
  final String email;

  PostUser({
    required this.id,
    required this.name,
    required this.email,
  });

  factory PostUser.fromJson(Map<String, dynamic> json) {
    return PostUser(
      id: json['id'],
      name: json['name'],
      email: json['email'],
    );
  }
}
