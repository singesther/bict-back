<div class="col-lg-4 col-md-4 sidebar sidebar--right u-md-down-margin-t-40" style="position: relative;">
    <div class="sidebar__inner is_stuck" data-sticky_column="" style="">
          <div class="widget widget--transparent-box categories-collapse">
                <div class="widget__title">
                    <h4>Categories</h4>
                </div>
            </div>

            <ul class="collapsing-cats">
                @foreach(App\Category::limit(10)->get() as $category)
                 <li><a href="{{ route('categories.single', $category->slug) }}"><i class="fa fa-angle-right"></i>{{$category->name}}<span class="count">{{ $category->posts()->count() }}</span></a></li>
                @endforeach
            </ul>
        </div>

        <div class="widget widget--transparent-box newsletter-three">
            <div class="newsletter-box">
                <h4>Subscribe to our maillist</h4>
                <p>Be updated for the new coming news</p>
                <form action="#">
                    <input placeholder="Email address" type="email">
                    <button><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </div>

        <div class="widget widget--transparent-box">
            <div class="widget__title">
                <h4>Social media</h4>
            </div>
            <div class="social-connect">
                <ul class="social--redius social--color">
                    <li><a class="social__facebook" target="_blank" href="https://www.facebook.com/viglojdrc/"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="social__twitter" target="_blank" href="https://twitter.com/viglojdrc"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="social__google-plus" target="_blank" href="https://plus.google.com/u/1/107652995699720522438"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="social__linkedin" target="_blank" href="https://www.linkedin.com/in/viglojdrc"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="social__instagram" target="_blank" href="https://www.instagram.com/viglojdrc/"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="widget widget--transparent-box img-banner">
            <figure>
                <a href="#">
                    <img src="/images/ad370x335.jpg" alt="">
                </a>
            </figure>
        </div>
</div>