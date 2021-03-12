<?php


function draw_filter_search_options(){ ?>
<nav class="small" id="toc">
    <ul class="list-unstyled">
        <li class="my-2">
        <h6 class="text-white">Sort by: </h6>
        <select class="form-select border-0 text-white" aria-label="Sorting Options">
            <option selected>Top</option>
            <option value="1">New</option>
            <option value="2">Trending</option>
        </select>
        </li>
        <li class="my-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label text-white" for="flexCheckDefault">
                    Only Partners Posts
                </label>
            </div>
        </li>
        <li class="my-2">
            <p class="text-white h5 pt-4 pb-3">Filter by categories:</p>
            <input autocomplete="off" type="text" id="filterInput" onkeyup="filterInList()" placeholder="Search for categories.." title="Type in a name">
            <ul id="listOption">
                <?php for($i=0;$i<10;){ ?>
                <li><a href="javascript:void(0)">Item <?= ++$i ?><input type="checkbox" name="filter-category" value="Item <?= ++$i ?>"></a></li>
                <?php } ?>
            </ul>
            <a class="text-white clear-all mt-2" href="javascript:void(0)" onclick="clearAll()">Clear All</a>
        </li>            
    </ul>
</nav>

<?php 
}
