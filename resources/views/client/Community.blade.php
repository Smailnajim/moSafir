<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href='{{ asset('css/client/community.css') }}'>
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
                        <a class="nav-link text-dark active" href="{{url('home/morroco')}}"><i class="bi bi-house-door"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('offers')}}"><i class="bi bi-box"></i> Offres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('aboutus')}}"><i class="bi bi-info-circle"></i> About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{url('community')}}"><i class="fa-solid fa-earth-africa"></i> community</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="column left-column">
            <form action="" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create Post</div>
                    </div>
                    <div class="create-post-actions">
                        <button type="submit" class="post-button">Post</button>
                    </div>
                    <textarea name="description" class="create-post-input" placeholder="What's on your mind?" required></textarea>
                    <div class="mb-6">
                        <label for="imageInput" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input 
                            type="text" 
                            name="image" 
                            id="imageInput" 
                            placeholder="Image URL" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent mb-3"
                            required
                            >
                        <div class="mt-2 border border-dashed border-gray-300 rounded-md p-2 bg-gray-50">
                            <img
                                class="w-2/5 h-auto mx-auto"
                                id="imageVue"
                                src="https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png"
                                alt="Preview will appear here"
                            >
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="column middle-column">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Posts</div>
                </div>
                
                @foreach ($posts as $post)
                    <div class="post">
                        <div class="post-header">
                            <div class="avatar">
                                <img src="{{ $post->userImage }}" alt="User avatar">
                            </div>
                            <div class="user-info">
                                <div class="name">{{ $post->fullName }}</div>
                                <div class="time">{{ $post->time }}</div>
                            </div>
                        </div>
                        <div class="post-content">
                            {{ $post->description }}
                            <div class="post-image">
                                <img src="{{ $post->image }}" alt="Image">
                            </div>
                        </div>
                        <div class="post-actions">
                            <div class="action">Like</div>
                            <div class="action">Comment</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="column right-column">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My Profile</div>
                </div>
                <div class="profile">
                    <div class="profile-avatar">
                        <img src="https://via.placeholder.com/80" alt="Profile avatar">
                    </div>
                    <div class="profile-name">Alex Johnson</div>
                    <div class="profile-username">@alexjohnson</div>
                    
                    <div class="profile-stats">
                        <div class="stat">
                            <div class="stat-value">248</div>
                            <div class="stat-label">Posts</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">1K</div>
                            <div class="stat-label">Followers</div>
                        </div>
                        <div class="stat">
                            <div class="stat-value">364</div>
                            <div class="stat-label">Following</div>
                        </div>
                    </div>
                    
                    <a href="{{url('profile/'.auth()->user()->first_name)}}" class="profile-button">View Profile</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('imageInput').addEventListener('input', function () {
        let image_vue = document.getElementById('imageVue');
        let image_url = this.value;

        if(image_url == '' )
        image_vue.src =  'https://upload.wikimedia.org/wikipedia/commons/a/a3/Image-not-found.png';
        else
        image_vue.src =  image_url;
    });
    </script>
</body>

</html>