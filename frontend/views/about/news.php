<?php

use yii\helpers\Url;
include('about-include/header.php');
?>

<div class="wrapper">
    <h1 class="page-title">News</h1>
    <section class="two-columns clearfix">
        <div class="secondary-content narrow">
            <div class="responsive-nav">
                <form class="clearfix">
                    <div class="custom-select" id="sel-category">
                        <select name="sel-category" class="chosen-select">
                            <option value="">Select category</option>
                            <option value="http://newsroom.fb.com/news/category/company-news/">
                                Company News </option>
                            <option value="http://newsroom.fb.com/news/category/events/">
                                Events </option>
                            <option value="http://newsroom.fb.com/news/category/news-feed-fyi/">
                                News Feed FYI </option>
                            <option value="http://newsroom.fb.com/news/category/product-news/">
                                Product News </option>
                            <option value="http://newsroom.fb.com/news/category/qa-with-mark-2/">
                                Q&amp;A with Mark </option>
                            <option value="http://newsroom.fb.com/news/category/internet-org/">
                                Internet.org </option>
                            <option value="http://newsroom.fb.com/news/category/trends/">
                                Trends </option>
                            <option value="http://newsroom.fb.com/news/category/search-fyi/">
                                Search FYI </option>
                        </select>
                    </div>
                    <div class="custom-select" id="sel-year">
                        <select name="sel-year" class="chosen-select">
                            <option value="">Select year</option>
                            <option value="http://newsroom.fb.com/news/2016">2016</option>
                            <option value="http://newsroom.fb.com/news/2015">2015</option>
                        </select>
                    </div>
                </form>
            </div>
            <aside class="no-card sidebar">
                <div class="sidebar-widget">
                    <h2>Contact Us</h2>
                    <p><a href="mailto:press@fb.com">press@fb.com</a></p>
                </div>
                <!--end:.sidebar-widget-->
                <div class="sidebar-widget">
                    <h2>Categories</h2>
                    <ul>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/company-news/index.html">
                                Company News									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/events/index.html">
                                Events									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/news-feed-fyi/index.html">
                                News Feed FYI									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/product-news/index.html">
                                Product News									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/qa-with-mark-2/index.html">
                                Q&amp;A with Mark									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/internet-org/index.html">
                                Internet.org									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/trends/index.html">
                                Trends									</a>
                        </li>
                        <li class="
										menu-item-object-category
																			">
                            <a href="category/search-fyi/index.html">
                                Search FYI									</a>
                        </li>
                    </ul>
                </div>
                <!--end:.sidebar-widget-->
                <div class="sidebar-widget">
                    <h2>Archive</h2>
                    <ul>
                        <li><a href="2016/index.html">2016</a></li>
                        <li><a href="2015/index.html">2015</a></li>
                    </ul>
                </div>
                <!--end:.sidebar-widget-->
                <div class="sidebar-widget featured-news">
                    <h2>Featured News</h2>
                    <div class="sidebar-featured-news-item">
                        <a href="2015/04/introducing-video-calling-in-messenger/index.html">
                            <img width="593" height="400" src="../../fbnewsroomus.files.wordpress.com/2015/04/messenger-video-call-carousel-icon4999.png?w=593" class="attachment-thumbnail size-thumbnail wp-post-image" alt="messenger-video-call-carousel-icon" srcset="https://fbnewsroomus.files.wordpress.com/2015/04/messenger-video-call-carousel-icon.png?w=593 593w, https://fbnewsroomus.files.wordpress.com/2015/04/messenger-video-call-carousel-icon.png?w=1186 1186w, https://fbnewsroomus.files.wordpress.com/2015/04/messenger-video-call-carousel-icon.png?w=300 300w, https://fbnewsroomus.files.wordpress.com/2015/04/messenger-video-call-carousel-icon.png?w=768 768w, https://fbnewsroomus.files.wordpress.com/2015/04/messenger-video-call-carousel-icon.png?w=1024 1024w" sizes="(max-width: 593px) 100vw, 593px" /> </a>
                        <h3><a href="2015/04/introducing-video-calling-in-messenger/index.html">Introducing Video Calling in Messenger</a></h3>
                        <p class="date">April 27, 2015</p>
                        <div class="excerpt">
                            <p>Now you can have face-to-face conversations with your friends and the people you care about via Messenger.</p>
                            <a href="2015/04/introducing-video-calling-in-messenger/index.html" class="read-more">Read more</a>
                        </div>
                    </div>
                    <!--end:.home-recent-news-item-->
                    <div class="sidebar-featured-news-item">
                        <a href="2015/04/introducing-hello/index.html">
                            <img width="600" height="250" src="../../fbnewsroomus.files.wordpress.com/2015/04/newsroom-01-coverimageaf90.png?w=600" class="attachment-thumbnail size-thumbnail wp-post-image" alt="NewsRoom-01-CoverImage" srcset="https://fbnewsroomus.files.wordpress.com/2015/04/newsroom-01-coverimage.png?w=600 600w, https://fbnewsroomus.files.wordpress.com/2015/04/newsroom-01-coverimage.png?w=1200 1200w, https://fbnewsroomus.files.wordpress.com/2015/04/newsroom-01-coverimage.png?w=300 300w, https://fbnewsroomus.files.wordpress.com/2015/04/newsroom-01-coverimage.png?w=768 768w, https://fbnewsroomus.files.wordpress.com/2015/04/newsroom-01-coverimage.png?w=1024 1024w" sizes="(max-width: 600px) 100vw, 600px" /> </a>
                        <h3><a href="2015/04/introducing-hello/index.html">Introducing Hello</a></h3>
                        <p class="date">April 22, 2015</p>
                        <div class="excerpt">
                            <p>See who&#8217;s calling, block unwanted calls and search for people and places.</p>
                            <a href="2015/04/introducing-hello/index.html" class="read-more">Read more</a>
                        </div>
                    </div>
                    <!--end:.home-recent-news-item-->
                </div>
                <!--end:.sidebar-widget-->
            </aside>
            <!--end:.no-card-->
        </div>
        <div class="primary-content wide" id="main">
            <div class="card post article-summary" id="post-6744">
                <div class="card-padding clearfix">
                    <header class="clearfix">
                        <p class="date">October 28, 2016</p>
                        <h2><a href="2016/10/preparing-for-the-us-election-2016/index.html">Preparing for the US Election 2016</a></h2>
                    </header>
                    <div class="featured-image">
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html">
                            <img width="960" height="715" src="../../fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x2289.png?w=960" class="attachment-large size-large wp-post-image" alt="elections-feature-image_2x" srcset="https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=960 960w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png 1920w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=537 537w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=300 300w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=768 768w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=1024 1024w" sizes="(max-width: 960px) 100vw, 960px" /> </a>
                    </div>
                    <div class="excerpt">
                        <p>We&#8217;re introducing a new feature that shows you what’s on the ballot — from candidates to ballot initiatives.</p>
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html" title="Permalink to Preparing for the US Election 2016">Read more</a>
                    </div>
                    <div class="entry-meta">
                        <div class="entry-category">
                            <span class="entry-meta-label">Category: </span>
                            <a href="category/product-news/index.html" title="Product News">Product News</a>
                        </div>
                    </div>
                    <!--end:.entry-meta-->
                </div>
                <!--end:.card-padding-->
            </div>
            <!--end:.card.article-summary-->

            <div class="card post article-summary" id="post-6744">
                <div class="card-padding clearfix">
                    <header class="clearfix">
                        <p class="date">October 28, 2016</p>
                        <h2><a href="2016/10/preparing-for-the-us-election-2016/index.html">Preparing for the US Election 2016</a></h2>
                    </header>
                    <div class="featured-image">
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html">
                            <img width="960" height="715" src="../../fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x2289.png?w=960" class="attachment-large size-large wp-post-image" alt="elections-feature-image_2x" srcset="https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=960 960w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png 1920w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=537 537w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=300 300w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=768 768w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=1024 1024w" sizes="(max-width: 960px) 100vw, 960px" /> </a>
                    </div>
                    <div class="excerpt">
                        <p>We&#8217;re introducing a new feature that shows you what’s on the ballot — from candidates to ballot initiatives.</p>
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html" title="Permalink to Preparing for the US Election 2016">Read more</a>
                    </div>
                    <div class="entry-meta">
                        <div class="entry-category">
                            <span class="entry-meta-label">Category: </span>
                            <a href="category/product-news/index.html" title="Product News">Product News</a>
                        </div>
                    </div>
                    <!--end:.entry-meta-->
                </div>
                <!--end:.card-padding-->
            </div>
            <!--end:.card.article-summary-->
            <div class="card post article-summary" id="post-6744">
                <div class="card-padding clearfix">
                    <header class="clearfix">
                        <p class="date">October 28, 2016</p>
                        <h2><a href="2016/10/preparing-for-the-us-election-2016/index.html">Preparing for the US Election 2016</a></h2>
                    </header>
                    <div class="featured-image">
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html">
                            <img width="960" height="715" src="../../fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x2289.png?w=960" class="attachment-large size-large wp-post-image" alt="elections-feature-image_2x" srcset="https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=960 960w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png 1920w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=537 537w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=300 300w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=768 768w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=1024 1024w" sizes="(max-width: 960px) 100vw, 960px" /> </a>
                    </div>
                    <div class="excerpt">
                        <p>We&#8217;re introducing a new feature that shows you what’s on the ballot — from candidates to ballot initiatives.</p>
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html" title="Permalink to Preparing for the US Election 2016">Read more</a>
                    </div>
                    <div class="entry-meta">
                        <div class="entry-category">
                            <span class="entry-meta-label">Category: </span>
                            <a href="category/product-news/index.html" title="Product News">Product News</a>
                        </div>
                    </div>
                    <!--end:.entry-meta-->
                </div>
                <!--end:.card-padding-->
            </div>
            <!--end:.card.article-summary-->
            <div class="card post article-summary" id="post-6744">
                <div class="card-padding clearfix">
                    <header class="clearfix">
                        <p class="date">October 28, 2016</p>
                        <h2><a href="2016/10/preparing-for-the-us-election-2016/index.html">Preparing for the US Election 2016</a></h2>
                    </header>
                    <div class="featured-image">
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html">
                            <img width="960" height="715" src="../../fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x2289.png?w=960" class="attachment-large size-large wp-post-image" alt="elections-feature-image_2x" srcset="https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=960 960w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png 1920w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=537 537w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=300 300w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=768 768w, https://fbnewsroomus.files.wordpress.com/2016/10/elections-feature-image_2x.png?w=1024 1024w" sizes="(max-width: 960px) 100vw, 960px" /> </a>
                    </div>
                    <div class="excerpt">
                        <p>We&#8217;re introducing a new feature that shows you what’s on the ballot — from candidates to ballot initiatives.</p>
                        <a href="2016/10/preparing-for-the-us-election-2016/index.html" title="Permalink to Preparing for the US Election 2016">Read more</a>
                    </div>
                    <div class="entry-meta">
                        <div class="entry-category">
                            <span class="entry-meta-label">Category: </span>
                            <a href="category/product-news/index.html" title="Product News">Product News</a>
                        </div>
                    </div>
                    <!--end:.entry-meta-->
                </div>
                <!--end:.card-padding-->
            </div>
            <!--end:.card.article-summary-->

            <nav class="navigation paging-navigation" role="navigation">
                <h1 class="screen-reader-text">Posts navigation</h1>
                <div class="nav-links">
                    <div class="nav-previous"><a href="page/2/index.html"><span class="meta-nav">&larr;</span> Older posts</a></div>
                </div>
                <!-- .nav-links -->
            </nav>
            <!-- .navigation -->
        </div>
        <!--end:.primary-content.wide-->
    </section>
    <!-- Your Google Analytics Plugin is missing the tracking ID -->
</div>
<!--end:.wrapper-->
<div id="newsroom-like">
    <div class="fb-like" data-href="https://newsroom.fb.com/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true" data-width="330"></div>
</div>
<div class="wrapper">
<?php
include('about-include/footer.php');
?>