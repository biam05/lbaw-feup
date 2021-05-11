<div class="row mb-3">
    @for ($i = 0; $i < $level; $i++)
        <div class="col-auto ps-4"></div>
    @endfor
    <div class="col">
        <div class="d-flex">
            <img src="../img/user.png" class="rounded-circle" alt="..." width="30" height="30">
            <p class="text-white text-muted px-2 m-0"><small>
                <a class="col-auto text-muted pe-2" href="../pages/profile.php">
                    <? if($partner){?>
                        <i class="fas fa-check"></i>
                    <?}?>
                    <?= $author?></a><?= $date?></small>
            {{--     @include('partials.modals.report_post', ['report_to_id' => $content_id, 'type'=>"comment"]) --}}
                <button class="clickable-big text-muted ps-2"><i class="fas fa-exclamation-triangle" data-bs-toggle="tooltip" data-bs-placement="top" title="Report"></i></button>
            </p> 
        </div> 
        <div class="row ms-4">
            <p class="text-white m-0 pb-1"><?= $comment?></p>   
            <div class="row align-items-center text-muted">
                <div class="col-auto d-flex flex-row pe-1 align-items-center">
                    <button class="clickable-big me-1">
                        <i class="fas fa-angle-up text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Upvote"></i>
                    </button>
                    <span class="col-auto ps-0 text-white"><?= $votes?></span>
                    <button class="clickable-big ms-1">
                        <i class="fas fa-angle-down text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Downvote"></i>
                    </button>
                </div>
                <button type="button" class="col-auto clickable text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-reply text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Reply"></i> <?= $replies?>
                </button>
            </div>  
        </div>                          
    </div>
</div>
