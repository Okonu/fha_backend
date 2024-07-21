<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body, h1, h2, h3, h4, h5 {font-family: "Raleway", sans-serif}
        .expandable {max-height: 100px; overflow: hidden; transition: max-height 0.5s ease;}
        .expanded {max-height: none;}
    </style>
</head>
<body class="w3-light-grey">

<div class="w3-content" style="max-width:1400px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-32">
        <h1><b>{{ config('app.name') }}</b></h1>
        <p>Welcome to the blog of <span class="w3-tag">{{ config('app.name', 'Founders Hub') }}</span></p>
    </header>

    <!-- Grid -->
    <div class="w3-row">

        <!-- Blog entries -->
        <div class="w3-col l8 s12">
            @foreach ($recentPosts as $post)
                <!-- Blog entry -->
                <div class="w3-card-4 w3-margin w3-white">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" style="width:100%">
                    <div class="w3-container">
                        <h3><b>{{ $post->title }}</b></h3>
                        <h5>{{ $post->sub_title }}, <span class="w3-opacity">{{ $post->created_at->format('M d, Y') }}</span></h5>
                    </div>
                    <div class="w3-container">
                        <p class="expandable">{{ $post->body }}</p>
                        <div class="w3-row">
                            <div class="w3-col m8 s12">
                                <p><button class="w3-button w3-padding-large w3-white w3-border read-more-btn"><b>READ MORE »</b></button></p>
                            </div>
                            <div class="w3-col m4 w3-hide-small">
                                <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">{{ $post->comments_count }}</span></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            <!-- END BLOG ENTRIES -->
        </div>

        <!-- Introduction menu -->
        <div class="w3-col l4">
            <!-- About Card -->
            <div class="w3-card w3-margin w3-margin-top">
                <img src="/w3images/avatar_g.jpg" style="width:100%">
                <div class="w3-container w3-white">
                    <h4><b>{{ $authorName }}</b></h4>
                </div>
            </div><hr>

            <!-- Popular Posts -->
            <div class="w3-card w3-margin">
                <div class="w3-container w3-padding">
                    <h4>Popular Posts</h4>
                </div>
                <ul class="w3-ul w3-hoverable w3-white">
                    @foreach ($popularPosts as $post)
                        <li class="w3-padding-16">
                            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w3-left w3-margin-right" style="width:50px">
                            <span class="w3-large">{{ $post->title }}</span><br>
                            <span>{{ $post->sub_title }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <hr>

            <!-- Tags -->
            <div class="w3-card w3-margin">
                <div class="w3-container w3-padding">
                    <h4>Tags</h4>
                </div>
                <div class="w3-container w3-white">
                    <p>
                        @foreach ($tags as $tag)
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">{{ $tag }}</span>
                        @endforeach
                    </p>
                </div>
            </div>

            <!-- END Introduction Menu -->
        </div>

        <!-- END GRID -->
    </div><br>

    <!-- END w3-content -->
</div>

<!-- Footer -->
{{--<footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">--}}
{{--    <button class="w3-button w3-black w3-disabled w3-padding-large w3-margin-bottom">Previous</button>--}}
{{--    <button class="w3-button w3-black w3-padding-large w3-margin-bottom">Next »</button>--}}
{{--    <p>Powered by <a href="" target="_blank">fha</a></p>--}}
{{--</footer>--}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const readMoreBtns = document.querySelectorAll('.read-more-btn');
        readMoreBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const content = this.closest('.w3-container').querySelector('.expandable');
                if (content.classList.contains('expanded')) {
                    content.classList.remove('expanded');
                    this.innerHTML = '<b>READ MORE »</b>';
                } else {
                    content.classList.add('expanded');
                    this.innerHTML = '<b>READ LESS »</b>';
                }
            });
        });
    });
</script>

</body>
</html>
