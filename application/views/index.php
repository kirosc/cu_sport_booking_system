<div class="wrapper">
    <div class="container-fluid">
        <section id="banner">
            <div class="container">
                <div class=" d-md-block text-center">
                    <h2>CUHK Sport</h2>
                    <p>Your All-in-One Sport Station</p>
                    <a href="#intro" class="btn btn-outline-light" id="learn-more">Learn More</a>
                </div>
            </div>
        </section>

        <div id="carousel-1" class="carousel slide multi-item-carousel" data-ride="carousel" style="border-top: 3px solid black; border-bottom: 3px solid black;">
          <div class="carousel-inner" role="listbox">
            <?php
            $count = 1;
            foreach ($announcements as $announ) :
              if ($count == 1): ?>
                <div class="carousel-item active">
                  <div class="item__third" id="bg-1">
                    <a href="<?php echo $detail_url . $announ->id; ?>"><img src="images/announcement/<?php echo $announ->image; ?>" alt="Event" style="width: 100%;"></a>
                  </div>
                  <div class="carousel-caption" style="bottom: 10%; top: auto;">
                    <h2><?php echo $announ->name; ?></h2>
                  </div>
                </div>
             <?php else: ?>
            <div class="carousel-item">
              <div class="item__third" id="bg-<?php echo $count;?>">
                <a href="<?php echo $detail_url . $announ->id; ?>"><img src="images/announcement/<?php echo $announ->image; ?>" alt="Event" style="width: 100%;"></a>
              </div>
              <div class="carousel-caption" style="bottom: 10%; top: auto;">
                <h2><?php echo $announ->name; ?></h2>
              </div>
            </div>
            <?php
            endif;
            $count = $count + 1;
            endforeach; ?>
          </div>
          <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <?php for ($i = 1; $i < $count-1; $i++): ?>
              <li data-target="#carousel-1" data-slide-to="<?php echo $i ?>"></li>
            <?php endfor; ?>
          </ol>
          <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <section class="introduction" id="intro">
            <div class="container-fluid">
                <div class="row">
                    <div class="col text-center" id="intro-title">
                        <h2>What You Can Do</h2>
                    </div>
                </div>
                <div class="row">
                    <section class="col col-md-4">
                        <div class="text-center"><i class="material-icons">supervisor_account</i></div>
                        <p class="text-center">Sign up for any awesome courses host by Physical Education Unit staff</p>
                    </section>
                    <section class="col col-md-4">
                        <div class="text-center"><i class="material-icons">today</i></div>
                        <p class="text-center">Book any available sport facility. Secure your reservation by paying up
                            front </p>
                    </section>
                    <section class="col col-md-4">
                        <div class="text-center"><i class="material-icons">share</i></div>
                        <p class="text-center">Share your booking session with your fellow schoolmates/staff</p>
                    </section>
                </div>
        </section>
        <section class="introduction" id="intro-2">
            <div class="container-fluid text-center">
                <nav class="nav nav-tabs flex-nowrap" role="tablist">
                    <a href="#nav-user" class="nav-item nav-link benefit active" role="tab" data-toggle="tab"
                       aria-controls="#nav-user" aria-selected="true">
                        User Benefits
                    </a>
                    <a href="#nav-coach" class="nav-item nav-link benefit" role="tab" data-toggle="tab"
                       aria-controls="#nav-coach" aria-selected="false">
                        Coach Benefits
                    </a>
                </nav>
                <div class="tab-content">
                    <div class="container-fluid tab-pane fade show active" id="nav-user" role="tabpanel"
                         aria-labelledby="nav-user-tab">
                        <div class="row">
                            <section class="col col-lg-4">
                                <div class="text-center"><i class="material-icons">attach_money</i></div>
                                <p class="text-center">Maintain an active and healthy lifestyle at reasonable price</p>
                            </section>
                            <section class="col col-lg-4">
                                <div class="text-center"><i class="material-icons">timeline</i></div>
                                <p class="text-center">Exercise everyday by joining interesting courses</p>
                            </section>
                            <section class="col col-lg-4">
                                <div class="text-center"><i class="material-icons">face</i></div>
                                <p class="text-center">Make new sports partner by sharing sports facilities</p>
                            </section>
                        </div>
                    </div>
                    <div class="container-fluid tab-pane fade" id="nav-coach" role="tabpanel"
                         aria-labelledby="nav-coach-tab">
                        <div class="row">
                            <section class="col col-lg-4">
                                <div class="text-center"><i class="material-icons">assignment</i></div>
                                <p class="text-center">Manage your courses all in one place</p>
                            </section>
                            <section class="col col-lg-4">
                                <div class="text-center"><i class="material-icons">attach_money</i></div>
                                <p class="text-center">Organise courses for teenagers and young generation at low cost</p>
                            </section>
                            <section class="col col-lg-4">
                                <div class="text-center"><i class="material-icons">location_on</i></div>
                                <p class="text-center">Multiple venues and facilities available everyday</p>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
