<?php $__env->startSection('title', $course->title); ?>

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/course.css')); ?>">
  
  <div class="course">
    <div class="container">
      <div class="row ">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="title"><?php echo e($course->title); ?></div>

            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('author/'.$author->id)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Duration:</div>
                <div class="course_info_text"><?php echo e($course->duration); ?> <?php echo e($course->duration_type); ?></div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  <?php if($course->course_fee>0): ?>
                    $<?php echo e($course->course_fee); ?>

                  <?php else: ?>
                    Free
                  <?php endif; ?>
                </div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('courses/catagory/'.$category->id)); ?>"><?php echo e($category->catagory_name); ?></a></div>
              </div>

            </div>

            <!-- Course Image -->
            <div class="course_banner">
                <img src="<?php echo e(asset('/storage/thumbnail/course/'.$course->thumbnail)); ?>">
                </div>

            <!-- Course Tabs -->
            <div class="course_tabs_container ">
              <div class="tabs">
                <div class="tab active">Description</div>
                <div class="tab">Books</div>
                <div class="tab">Videos</div>
                <div class="tab">PPT</div>
                <div class="tab">Reference</div>
                <div class="tab">Instruction</div>
                <div class="tab">Question</div>
                <div class="tab">Comments</div>
                <div class="tab">Reviews</div>
              </div>
              
              <div class="tab_panels">

                <!-- Description -->
                <div class="tab_panel active">
                  <div class="tab_panel_title">Introduction</div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p><?php echo e($course->introduction_text); ?></p>

                        <?php if($file_ext=='mp4'): ?>
                          <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
                            <source src="<?php echo e(asset('/storage/files/course/introduction_files/'.$course->introduction_file)); ?>" type="video/mp4">
                            Your browser does not support HTML5 video.
                          </video>
                        <?php elseif($file_ext=='pdf'): ?>
                            <div class="dropdown_item_title"><a class="book_file" file="<?php echo e($course->introduction_file); ?>" link="<?php echo e(asset('/storage/files/course/introduction_files/'.$course->introduction_file)); ?>" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  View study instruction file</a></div>
                        <?php elseif($file_ext=='ppt'): ?>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="ppt_file" file="<?php echo e($course->introduction_file); ?>" link="<?php echo e(asset('/storage/files/course/introduction_files/'.$course->introduction_file)); ?>" data-target="#examplePPTCenter"><i class="fa fa-list-alt" aria-hidden="true"></i>   View study instruction file</a></div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Outcome</div>
                      <ul class="tab_panel_bullets">
                        <?php $__currentLoopData = $outcomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outcome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($outcome): ?>
                            <li><?php echo e($outcome); ?></li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Description</div>
                      <div class="tab_panel_text">
                        <p><?php echo e($course->description); ?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Books -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Books</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        <?php $__currentLoopData = $book_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($book_file): ?>
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a class="book_file" file="<?php echo e($book_file); ?>" link="<?php echo e(asset('/storage/files/course/books/'.$book_file)); ?>" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php echo e($book_file); ?></a></div>
                            </div>
                          </li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Videos -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Videos</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        <?php $__currentLoopData = $video_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($video_file): ?>
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="video_file" file="<?php echo e($video_file); ?>" link="<?php echo e(asset('/storage/files/course/videos/'.$video_file)); ?>" data-target="#exampleVideoCenter"><i class="fa fa-youtube-play" aria-hidden="true"></i>  <?php echo e($video_file); ?></a></div>
                            </div>
                          </li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- PPT -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">PPT</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        <?php $__currentLoopData = $ppt_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($ppt_file): ?>
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="ppt_file" file="<?php echo e($ppt_file); ?>" link="<?php echo e(asset('/storage/files/course/ppts/'.$ppt_file)); ?>" data-target="#examplePPTCenter"><i class="fa fa-list-alt" aria-hidden="true"></i>  <?php echo e($ppt_file); ?></a></div>
                            </div>
                          </li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                </div>
                
                <!-- Reference -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Books</div>
                    <div class="tab_panel_content">
                      
                      <?php $__currentLoopData = $book_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($book_link): ?>
                          <div class="ext_link"><i class="fa fa-chrome" aria-hidden="true"></i>  <a href="http://<?php echo e($book_link); ?>"><?php echo e($book_link); ?></a></div>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>


                    <div class="tab_panel_title">Videos</div>
                    <div class="tab_panel_content">

                      <?php $__currentLoopData = $video_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($video_link): ?>
                          <div class="ext_link"><i class="fa fa-chrome" aria-hidden="true"></i>  <a href="http://<?php echo e($video_link); ?>"><?php echo e($video_link); ?></a></div>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </div>

                    <div class="tab_panel_title">PPT</div>
                      <div class="tab_panel_content">

                      <?php $__currentLoopData = $ppt_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($ppt_link): ?>
                          <div class="ext_link"><i class="fa fa-chrome" aria-hidden="true"></i>  <a href="http://<?php echo e($ppt_link); ?>"><?php echo e($ppt_link); ?></a></div>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </div>
                  </div>
                </div>

                <!-- Instruction -->
                <div class="tab_panel">
                  <?php for($i=1;$i<=$duration;$i++): ?>
                  <div class="tab_panel_title">Session <?php echo e($i); ?></div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p><?php echo e($instructions[$i-1]); ?></p>
                    </div>
                  </div>
                  <?php endfor; ?>
                </div>

                <!-- Questions -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Exam Questions</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        <?php $__currentLoopData = $exam_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($exam_file): ?>
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a class="book_file" file="<?php echo e($exam_file); ?>" link="<?php echo e(asset('/storage/files/course/examfiles/'.$exam_file)); ?>" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  <?php echo e($exam_file); ?></a></div>
                            </div>
                          </li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Comments -->
               <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/review.css')); ?>">
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Comments (<?php echo e($total_comment); ?>)</div>
                    <div class="tab_panel_content">


                          <div class="col-sm-12 review-block">
                            <form class="panel-body" method="POST" action="<?php echo e(route('comment')); ?>">
                              <?php echo e(csrf_field()); ?>


                              <input type="hidden" name="content_id" value="<?php echo e($course->id); ?>">
                              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                              <input type="hidden" name="type" value="course">
                              <div class="form-group">
                                <textarea name="comment" placeholder="Enter your comment" class="form-control" required></textarea>
                              </div>
                              <input class="btn btn-success" type="submit" value="Submit">

                            </form>
                          </div> 

                          <?php $i =0 ?>
                          <?php $__currentLoopData = $all_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="review-block">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <?php if($commented_users[$i]->pp != null): ?>
                                        <img src="<?php echo e(asset('/storage/thumbnail/author/'.$commented_users[$i]->pp)); ?>" class="img-rounded" width="60px" height: "200px">
                                      <?php else: ?>
                                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded"  width="50px" height: "250px">
                                      <?php endif; ?>
                                    <div class="review-block-name"> <?php echo e($commented_users[$i]->first_name); ?> <?php echo e($commented_users[$i]->last_name); ?></div>
                                    <div class="review-block-date"> <?php echo e($comment->created_at); ?></div>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="review-block-description"><?php echo e($comment->comment); ?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php $i++ ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <a class="btn btn-primary btn-block" href="<?php echo e(asset('courses/comment/'.$course->id)); ?>">View All Comments</a>
                        
                    </div>
                  </div>
                </div>

                <!-- Reviews -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_content">

                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="rating-block">
                                <h4>Average Rating</h4>
                                <h2 class="bold padding-bottom-7"> <?php echo e(sprintf('%0.1f',$avg_rating)); ?> <small>/ 5</small></h2>
                                
                              </div>
                            </div>
                            <div class="col-sm-6 rating-block">
                              <h4 style="margin-bottom: 10px">Rating breakdown</h4>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;"><?php echo e($star5); ?></div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;"><?php echo e($star4); ?></div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;"><?php echo e($star3); ?></div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;"><?php echo e($star2); ?></div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;"><?php echo e($star1); ?></div>
                              </div>
                            </div>      
                          </div>    

                          <?php if($rated == null): ?>

                          <div class="col-sm-12 review-block">
                            <form class="panel-body" method="POST" action="<?php echo e(route('review')); ?>">
                              <?php echo e(csrf_field()); ?>


                              <input type="hidden" name="content_id" value="<?php echo e($course->id); ?>">
                              <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                              <input type="hidden" name="type" value="course">
                              <div class="form-group">

                                <label class="control-label" for="file_catagory" style="font-size: 18px; font-weight: bold;">Your Rating: </label>
                                <div class="rating">
                                  <input type="radio" name="rating" id="star5" value="5"> <label for="star5"></label>
                                  <input type="radio" name="rating" id="star4" value="4"> <label for="star4"></label>
                                  <input type="radio" name="rating" id="star3" value="3"> <label for="star3"></label>
                                  <input type="radio" name="rating" id="star2" value="2"> <label for="star2"></label>
                                  <input type="radio" name="rating" id="star1" value="1"> <label for="star1"></label>
                               </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label" for="file_catagory">Review (optional)</label>
                                <textarea name="comment" placeholder="Enter your review" class="form-control"></textarea>
                              </div>
                              <input class="btn btn-success" type="submit" value="Submit">
                            </form>
                          </div>  

                          <?php endif; ?>
                          
                          <?php $i =0 ?>
                          <?php $__currentLoopData = $all_review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="review-block">
                                <div class="row">
                                  <div class="col-sm-3">
                                    <?php if($reviewed_users[$i]->pp != null): ?>
                                        <img src="<?php echo e(asset('/storage/thumbnail/author/'.$reviewed_users[$i]->pp)); ?>" class="img-rounded" width="60px" height: "200px">
                                      <?php else: ?>
                                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded"  width="50px" height: "250px">
                                      <?php endif; ?>
                                    <div class="review-block-name"> <?php echo e($reviewed_users[$i]->first_name); ?> <?php echo e($reviewed_users[$i]->last_name); ?></div>
                                    <div class="review-block-date"> <?php echo e($review->created_at); ?></div>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="review-block-rate"> 
                                      <?php for($j = 0; $j < $review->rating; $j++): ?>
                                        <span class="fa fa-star text-warning" aria-hidden="true"></span>
                                      <?php endfor; ?>
                                      <?php for($j = $review->rating; $j< 5; $j++): ?>
                                        <span class="fa fa-star text-grey" aria-hidden="true"></span>
                                      <?php endfor; ?>
                                    </div>
                                    <div class="review-block-description"><?php echo e($review->comment); ?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php $i++ ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                          <a class="btn btn-primary btn-block" href="<?php echo e(asset('courses/review/'.$course->id)); ?>">View All Review</a>
                          
                        </div> 
                        
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">

              <!-- Feature -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Trainer</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <!-- <img src="https://i1.sndcdn.com/avatars-000277650592-n7idgx-t500x500.jpg" alt=""> -->
                        <img src="<?php echo e(asset('/storage/thumbnail/author/'.$author->pp)); ?>" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="<?php echo e(asset('author/'.$author->id)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
                      <div class="teacher_position"><?php echo e($author->occupation); ?> at <?php echo e($author->organization); ?></div>
                    </div>
                  </div>
                  <div class="teacher_info">
                    <p><?php echo e($course->trainer_description); ?></p>
                  </div>
                </div>
              </div>

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Related Courses</div>
                <div class="sidebar_latest">
                  <?php $__currentLoopData = $related_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div><img src="<?php echo e(asset('/storage/thumbnail/course/'.$related_course->thumbnail)); ?>" alt="Icon"></div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="<?php echo e(asset('courses/view/'.$related_course->id)); ?>"><?php echo e($related_course->title); ?></a></div>
                        <div class="course_author">
                          <?php if($related_course->course_fee>0): ?>
                            $<?php echo e($related_course->course_fee); ?>

                          <?php else: ?>
                            Free
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo e(asset('content/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/course.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<!-- Book -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleBookCenterTitle">Book: Lorem Ipsn gravida nibh vel velit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe class="pdf_viewer" src="http://docs.google.com/gview?embedded=true&url=https://desinnet.myblog.it/media/00/02/282529104.ppt" width="100%" style="height:600px;" frameborder="0">
            </iframe> 
      </div>
    </div>
  </div>
</div>

<!-- Video -->
<div class="modal fade" id="exampleVideoCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleVideoCenterTitle">Video: Lorem Ipsn gravida nibh vel velit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
          <source class="video_source" src="/content/image/mov_bbb.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>
      </div>
    </div>
  </div>
</div>

<!-- PPT -->
<div class="modal fade" id="examplePPTCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examplePPTCenterTitle">PPT: Lorem Ipsn gravida nibh vel velit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe class="ppt_viewer" src="https://view.officeapps.live.com/op/embed.aspx?src=https://www.microarch.org/micro37/presentations/slides-198.ppt" width="100%" style="height:550px;" frameborder="0">
            </iframe> 
      </div>
    </div>
  </div>
</div>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>