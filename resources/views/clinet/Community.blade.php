<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style3.css">
    <title>Community</title>

</head>

<body>
    <nav style="position: fixed;" class="navbar navbar-expand-lg bg-white navbar-light">
        <div class="container-fluid">
            <h4 class="navbar-brand text-dark"><i class="fa-solid fa-street-view"></i> moSafir</h4>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark active" href="./index.html"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./offer.html"><i class="bi bi-box"></i> offres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href=""><i class="fa-solid fa-earth-africa"></i>
                            Community </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="./index.html#aboutUs"><i class="bi bi-info-circle"></i> About us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- قسم التعليقات (يتم إظهاره عند الضغط على زر تعليق) -->
    <div class="comments-section" id="commentsSection" style="display: none;">
        <div class="add-comment">
            <textarea class="comment-input" placeholder="أضف تعليق..."></textarea>
            <button class="comment-submit">أضف تعليق</button>
        </div>
        <div class="comments-list" id="commentsList" >
            <!-- هنا يتم إضافة التعليقات -->
        </div>
    </div>
    <div class="continer">
        <div class="new-post">
            <div class="new-post-header">
                <img class="profile-pic" src="https://via.placeholder.com/50" alt="صورة المستخدم">
                <textarea class="post-input" placeholder="ماذا يدور في ذهنك؟"></textarea>
            </div>
            <div class="new-post-footer">
                <input type="file" class="image-upload" accept="image/*">
                <button class="post-submit">نشر</button>
            </div>
            
        </div>


        <div class="post">
            <div class="post-header">
                <div class="user-info">
                    <img class="profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg" alt="صورة المستخدم">
                    <div class="user-details">
                        <h3 class="user-name">أحمد محمد</h3>
                        <span class="post-time">منذ ساعتين</span>
                    </div>
                </div>
            </div>
            

            <div class="post-body">
                <div class="image-container">
                    <img src="./pexels-zakaria-2827374.jpg" alt="صورة المنشور">
                </div>
                <div class="right">
                    <div class="description">
                        <p>هذا هو الوصف الذي يظهر فوق الصورة. يمكن أن يكون وصفًا قصيرًا أو نصًا تفسيريًا للصورة.</p>
                    </div>
                    <div class="comments-section">
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg"
                                    alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">محمد علي</h4>
                                    <p class="comment-time">منذ 10 دقائق</p>
                                </div>
                            </div>
                            <p class="comment-text">منشور رائع! أعجبني كثيرًا</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg"
                                    alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">محمد علي</h4>
                                    <p class="comment-time">منذ 10 دقائق</p>
                                </div>
                            </div>
                            <p class="comment-text">منشور رائع! أعجبني كثيرًا</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-zakaria-2827374.jpg" alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">سارة خالد</h4>
                                    <p class="comment-time">منذ ساعة</p>
                                </div>
                            </div>
                            <p class="comment-text">أعتقد أن هذه الصورة رائعة أيضًا!</p>
                        </div>

                        <div class="post-actions">
                            <button class="like-btn"><i class="fa-solid fa-thumbs-up"></i> 15</button>
                            <button class="dislike-btn"><i class="fa-solid fa-thumbs-down"></i> 2</button>
                            <button onclick="toggleCommentSection()" class="comment-btn"><i class="fa-solid fa-comment"></i> 7</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="post">
            <div class="post-header">
                <div class="user-info">
                    <img class="profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg" alt="صورة المستخدم">
                    <div class="user-details">
                        <h3 class="user-name">أحمد محمد</h3>
                        <span class="post-time">منذ ساعتين</span>
                    </div>
                </div>
            </div>

            <div class="post-body">
                <div class="image-container">
                    <img src="./pexels-zakaria-2827374.jpg" alt="صورة المنشور">
                </div>
                <div class="right">
                    <div class="description">
                        <p>هذا هو الوصف الذي يظهر فوق الصورة. يمكن أن يكون وصفًا قصيرًا أو نصًا تفسيريًا للصورة.</p>
                    </div>
                    <div class="comments-section">
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg"
                                    alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">محمد علي</h4>
                                    <p class="comment-time">منذ 10 دقائق</p>
                                </div>
                            </div>
                            <p class="comment-text">منشور رائع! أعجبني كثيرًا</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg"
                                    alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">محمد علي</h4>
                                    <p class="comment-time">منذ 10 دقائق</p>
                                </div>
                            </div>
                            <p class="comment-text">منشور رائع! أعجبني كثيرًا</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-zakaria-2827374.jpg" alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">سارة خالد</h4>
                                    <p class="comment-time">منذ ساعة</p>
                                </div>
                            </div>
                            <p class="comment-text">أعتقد أن هذه الصورة رائعة أيضًا!</p>
                        </div>

                        <div class="post-actions">
                            <button class="like-btn"><i class="fa-solid fa-thumbs-up"></i> 15</button>
                            <button class="dislike-btn"><i class="fa-solid fa-thumbs-down"></i> 2</button>
                            <button onclick="toggleCommentSection()" class="comment-btn"><i class="fa-solid fa-comment"></i> 7</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="post">
            <div class="post-header">
                <div class="user-info">
                    <img class="profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg" alt="صورة المستخدم">
                    <div class="user-details">
                        <h3 class="user-name">أحمد محمد</h3>
                        <span class="post-time">منذ ساعتين</span>
                    </div>
                </div>
            </div>

            <div class="post-body">
                <div class="image-container">
                    <img src="./pexels-zakaria-2827374.jpg" alt="صورة المنشور">
                </div>
                <div class="right">
                    <div class="description">
                        <p>هذا هو الوصف الذي يظهر فوق الصورة. يمكن أن يكون وصفًا قصيرًا أو نصًا تفسيريًا للصورة.</p>
                    </div>
                    <div class="comments-section">
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg"
                                    alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">محمد علي</h4>
                                    <p class="comment-time">منذ 10 دقائق</p>
                                </div>
                            </div>
                            <p class="comment-text">منشور رائع! أعجبني كثيرًا</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-leah-newhouse-50725-3935702.jpg"
                                    alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">محمد علي</h4>
                                    <p class="comment-time">منذ 10 دقائق</p>
                                </div>
                            </div>
                            <p class="comment-text">منشور رائع! أعجبني كثيرًا</p>
                        </div>
                        <div class="comment">
                            <div class="comment-header">
                                <img class="comment-profile-pic" src="./pexels-zakaria-2827374.jpg" alt="صورة المستخدم">
                                <div class="comment-user-details">
                                    <h4 class="comment-user-name">سارة خالد</h4>
                                    <p class="comment-time">منذ ساعة</p>
                                </div>
                            </div>
                            <p class="comment-text">أعتقد أن هذه الصورة رائعة أيضًا!</p>
                        </div>

                        <div class="post-actions">
                            <button class="like-btn"><i class="fa-solid fa-thumbs-up"></i> 15</button>
                            <button class="dislike-btn"><i class="fa-solid fa-thumbs-down"></i> 2</button>
                            <button onclick="toggleCommentSection()" class="comment-btn"><i class="fa-solid fa-comment"></i> 7</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="script2.js"></script>
</body>

</html>