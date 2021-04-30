<div class="card mb-3 text-white bg-light-dark">
    <div class="card-body">
        <div class="row card-title justify-content-between mb-2">
            <a href="../pages/news.php" class="col-auto text-white text-decoration-none">
                <h5 >Billie Eilish won the coveted Record of the Year at Sunday's Grammy Awards</h5>
            </a>
            
            <!-- TODO verificar se é o owner -->
            <?php if (false) { ?>
                <div class="col-auto">
                    <button type="button" class="card-report clickable-big text-primary pe-2 preventer" data-bs-toggle="modal" data-bs-target="#editPost">
                    <i class="fa fa-pencil" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="col-auto card-report clickable-big text-danger preventer" data-bs-toggle="modal" data-bs-target="#deletePostModal">
                        <i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                    </button>
                </div>
            <?php 
            
            } else { ?>
                <button type="button" id="toastbtn" class="col-auto card-report clickable-big text-white preventer" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-exclamation-triangle" data-bs-toggle="tooltip" data-bs-placement="top" title="Report"></i>
                </button>
            <?php 
            
            } ?>
                
                
                
            
        </div>
        
        <div class="row justify-content-between card-subtitle mb-2">
            <a class="col-auto clickable text-muted text-decoration-none" href="../pages/profile.php">
                <h6>
                    <!-- TODO verificar se é partner -->
                <? if(true){?>
                    <i class="fas fa-check"></i>
                <?}?>
                x/johndoe
                </h6>
            </a>
            <h6 class="col-auto text-muted">1h ago</h6>
        </div>

        <img src={{ asset('img/billieeilish.jpg') }} class="card-img-top" alt="..." draggable="false">
        <p class="card-text text-truncate mt-2">
            The 19-year-old singer felt "embarrassed" to accept the night's biggest honour for 'Everything I Wanted' because she was thought Megan Thee Stallion "deserved" it more for 'Savage', her collaboration with Beyonce.
        </p>
        
        
    </div>
    <footer class="card-footer text-muted">
        <div class="row">
            <?php
            $tags=["pop", "music"];
            foreach ($tags as $tag) {
                ?>
                <button class="col-auto clickable text-white px-1">#<?= $tag ?></button>
                <?php
            }
            ?>
        </div>
        <div class="row align-items-center">
            <div class="col-auto d-flex flex-column pe-1">
                <button class="clickable-big">
                    <i class="fas fa-angle-up text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Upvote"></i>
                </button>
                <button class="clickable-big">
                    <i class="fas fa-angle-down text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Downvote"></i>
                </button>
            </div>
            <span class="col-auto ps-1 text-white">7873</span>
            <button class="col-auto clickable text-white">
                <i class="fas fa-comment text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments"></i> 2
            </button>
        </div>
    </footer>
</div>
    