<?php include_once APPPATH . 'views/school/includes/header.php'; ?>

<style type="text/css">

.fw-bolder{

    position: relative;

}

..nk-tb-list{

    font-size: 0.875rem !important;

}

.option--box, .question--mark{

    color: #526484 !important;



}

</style>



<body class="nk-body npc-crypto bg-lighter has-sidebar ">

    <div class="nk-app-root">

        <div class="nk-main ">



            <?php include_once APPPATH . 'views/school/includes/sidebar.php'; ?>



            <div class="nk-wrap ">



                <?php include_once APPPATH . 'views/school/includes/navbar.php'; ?>



                <div class="nk-content nk-content-fluid">

                    <div class="container-xl wide-lg">

                        <div class="nk-content-body">

                            <div class="nk-block-head nk-block-head-sm" style="margin-bottom: -25px !important;">

                                <div class="nk-block-between">

                                    <div class="nk-block-head-content w-100 bg-white rounded border d-flex justify-content-evenly py-3 align-items-center">



                                        <div class="d-flex justify-content-center align-items-center flex-column">

                                            <div class="fs-6 fw-bold mb-2 exam-name">Examination Name</div>

                                            <div class="px-2" id="exam_name"></div>

                                        </div>



                                        <div class="d-flex justify-content-center align-items-center flex-column">

                                            <div class="fs-6 fw-bold mb-2 license-type">License Type</div>

                                            <div class="px-2" id="license_name"></div>

                                        </div>

                                        <div class="d-flex justify-content-center align-items-center flex-column">

                                            <div class="fs-6 fw-bold mb-2 sub-type">Sub License Type</div>

                                            <div class="px-2" id="sublicense_name"></div>

                                        </div>

                                        <div class="d-flex justify-content-center align-items-center flex-column">

                                            <div class="fs-6 fw-bold mb-2 tot-questions">Total Questions</div>

                                            <div class="px-2" id="total_question"></div>

                                        </div>

                                        <div class="d-flex justify-content-center align-items-center flex-column">

                                            <div class="fs-6 fw-bold mb-2 tot-families">Total Groups</div>

                                            <div class="px-2" id="total_family"></div>

                                        </div>

                                        <div class="d-flex justify-content-center align-items-center flex-column">

                                            <div class="fs-6 fw-bold mb-2 tot-diff-level">Total Difficulty Levels</div>

                                            <div class="px-2" id="total_difficulty_levels"></div>

                                        </div>



                                    </div>

                                    <div class="nk-block-head-content">

                                        <div class="toggle-wrap nk-block-tools-toggle">

                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"

                                                data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>

                                            <div class="toggle-expand-content" data-content="pageMenu">

                                                <ul class="nk-block-tools g-3">



                                                </ul>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <br><br>

                            <div class="nk-block" >

                                <div class="card card-bordered card-stretch" style="border: 1px solid #dbdfea;">

                                    <div class="card-inner-group">
                                    <div class="card-inner position-relative card-tools-toggle">
                                        <div class="card-title-group">
                                            <div class="card-tools">
                                            </div>
                                            <div class="card-tools me-n1">
                                            <ul class="btn-toolbar gx-1">
                                                <li>
                                                    <div class="toggle-wrap">
                                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                        <div class="toggle-content" data-content="cardTools">
                                                        <ul class="btn-toolbar gx-1">
                                                            <li class="toggle-close"><a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a></li>
                                                            <li>
                                                                <div class="dropdown">
                                                                <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                                data-bs-toggle="dropdown">
                                                                <div class="dot dot-primary"></div>
                                                                <em class="icon ni ni-filter-alt"></em>
                                                                </a>
                                                                <div
                                                                class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                                                <div class="dropdown-head">
                                                                    <span class="sub-title dropdown-title filters">Filters</span>
                                                                    <!-- <div class="dropdown"><a href="#" class="btn btn-sm btn-icon"><em class="icon ni ni-more-h"></em></a></div> -->
                                                                </div>
                                                                <div class="dropdown-body dropdown-body-rg">
                                                                    <form id="filter_form">
                                                                        <div class="row gx-6 gy-3">
                                                                            <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="overline-title overline-title-alt family">Group</label>
                                                                                <select id="family_filter"
                                                                                    name="family_id"
                                                                                    class="form-select form-select-sm form-control"
                                                                                    data-placeholder="Choose Group">
                                                                                </select>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    class="overline-title overline-title-alt diff-level">Difficulty
                                                                                    Level</label>
                                                                                <select name="difficulty_level"
                                                                                    id="difficulty_level_filter"
                                                                                    class="form-select form-select-sm form-control"
                                                                                    data-placeholder="Choose difficult level">

                                                                                </select>
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <!-- <div class="form-group">
                                                                                    <label
                                                                                        class="overline-title overline-title-alt que-type">Question
                                                                                        Type</label>
                                                                                    <select name="question_type"
                                                                                        class="form-select form-select-sm form-control"
                                                                                        id="question_type" data-placeholder="Select Question Type">
                                                                                        <option value=""></option>
                                                                                        <option value="1">Text</option>
                                                                                        <option value="2">With Image</option>
                                                                                        <option value="3">With Video</option>
                                                                                    </select>
                                                                                </div> -->
                                                                            </div>
                                                                            <div class="col-12">
                                                                            <div class="d-flex align-items-center">
                                                                                <input type="checkbox" value="1"
                                                                                    name='is_elimentry' class="me-2" />
                                                                                <label class="elim-que">Eliminatory
                                                                                    Questions</label>

                                                                            </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                            <div class="form-group">
                                                                                <button type="submit"
                                                                                    class="btn btn-secondary apply-btn">Apply</button>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="dropdown-foot between"> <button type="reset"
                                                                        class="clickable bg-transparent border-0 text-primary"
                                                                        id="form_clear">Clear Filters</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </li>
                                                            <li>
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-setting"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                                                    <ul class="link-check">
                                                                        <li><span class="show-label">Show</span></li>
                                                                        <li><a href="javascript:void(0)" style="justify-content: space-between;">10
                                                                                <input onchange="getQuestion(1,{page_size:10})" checked="" type="checkbox" class="radio" value="1" name="fooby[1][]"></a></li>
                                                                        <li><a href="javascript:void(0)" style="justify-content: space-between;">20
                                                                                <input onchange="getQuestion(1,{page_size:20})" type="checkbox" class="radio" value="1" name="fooby[1][]"></a></li>
                                                                        <li><a href="javascript:void(0)" style="justify-content: space-between;">50
                                                                                <input onchange="getQuestion(1,{page_size:50})" type="checkbox" class="radio" value="1" name="fooby[1][]"></a></li>
                                                                    </ul>

                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            </div>
                                        </div>
                                        <div class="card-search search-wrap" data-search="search">
                                            <form id="search_pool" class="mb-0 w-100">
                                            <div class="search-content d-flex">
                                                <a href="javascript:void(0)" id="search-reset" class="search-bk btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-cross"></em></a>
                                                <input name="q" id="q" type="search" class="form-control border-transparent form-focus-none" placeholder="Search">
                                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                        <div class="card-inner p-0">

                                            <div class="nk-tb-list nk-tb-ulist" id="relevant_questions">

                                                

                                            </div>

                                        </div>

                                        <div class="card-inner" id="relevant_questions_pagination">



                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <?php include_once APPPATH . 'views/school/includes/footer.php'; ?>

            </div>

        </div>

    </div>



    <?php include_once APPPATH . 'views/school/includes/footer_scripts.php'; ?>

    <script src="<?php echo base_url('assets/js/libs/simplePagination.js');?>"></script>



    <script>

        $(function () {

            async function init() {

                const auth = await appModule.checkAuth();

            }



            getQuestion();
            init();

        });

        let page = 1;
        var page_size = 10;
        var filters = '';
        let families = '';
        let difficulty_levels = '';


        function getQuestion(pageNumber = page, options = {})
        {
            showLoader();
            page_size = options.page_size ? options.page_size : page_size; 
            filters = options.filters ? options.filters : filters; 

            $.ajax({
                type: "GET",
                url: api_base_url+"relevent-questions/"+getUrlParam('id')+"?page="+pageNumber+"&page_size="+page_size,
                data: filters
            }).done(({status, data, exam_name, license_name, sub_license_name, total_family, total_difficulty_levels, filter_data})=>{
                if(status)
                {

                    $("#exam_name").html(exam_name)

                    $("#license_name").html(license_name)

                    $("#sublicense_name").html(sub_license_name)

                    $("#total_question").html(data.total)

                    $("#total_family").html(total_family)

                    $("#total_difficulty_levels").html(total_difficulty_levels)


                    if(!families)
                    {
                        $("#family_filter").html('<option value=""></option>')

                        filter_data.families.forEach(fam =>{
                            $("#family_filter").append(`<option value="${fam.id}">${fam.family_name}</option>`)
                        })
                        families = filter_data.families;
                    }



                    if(!difficulty_levels)
                    {
                        $("#difficulty_level_filter").html('<option value=""></option>')

                        filter_data.difficulty_levels.forEach(diff =>{
                            $("#difficulty_level_filter").append(`<option value="${diff.id}">${diff.level}</option>`)
                        })
                        difficulty_levels = filter_data.difficulty_levels;
                    }




                    $("#relevant_questions").html('');
                    if(data.data.length > 0)
                    {
                        data.data.forEach((item)=>{

                        let options = '';

                            item.options.forEach(option=>{

                            options += `

                            <div class="option--box">

                                    <div class="option--item ${option.is_correct ? 'success' : ''}">

                                        <div

                                            style="display: flex; align-items: center; height: 2.5rem;">

                                            <input style="margin-right: 10px;"

                                                value="1" ${option.is_correct ? 'checked' : 'disabled'}

                                                class="radio-inline"

                                                type="radio">

                                            ${option.option_name}

                                        </div>

                                    </div>

                                </div>

                            `

                            }) 

                            $("#relevant_questions").append(`

                                <div class='row'>

                                    <div class='col-12 col-lg-9 col-sm-12'>

                                        <div class="card">

                                            <div class="card-aside-wrap">

                                                <div class="card-content">

                                                    <div class="card-inner pe-0">
                                                        ${item.eliminatory_question ? `<p class="text-warning fw-bolder">Note: Eliminatory Question</p>` : ''}
                                                        <div class="nk-block">

                                                            <div

                                                                class="nk-block-head nk-block-head-sm nk-block-between questions">



                                                                <h6 class="title"><span>${data.from++}) </span>${item.question}</h6>

                                                            </div>

                                                            <div class="form-group col-md-12 options--block">

                                                                ${options}

                                                            </div>

                                                            <div class="question--mark clearfix d-flex flex-column gy-2 border-bottom">

                                                                <span><b>Mark : </b> ${item.marks}</span>

                                                                <div class="d-flex justify-content-between">

                                                                    <span><b>Group:</b> ${item.family_name}</span>

                                                                    <div>

                                                                        <span><b>Difficulty:</b> ${item.level}</span>

                                                                    </div>

                                                                </div>

                                                            </div>



                                                        </div>



                                                    </div>

                                                </div>



                                            </div>

                                        </div>

                                    </div>

                                    <div class='col-12 col-lg-3 col-sm-12 d-flex align-items-center'>

                                        ${

                                            item.image ? 

                                            `<img src='${item.image}' class='w-75'/>`

                                            : item.video ?

                                            `<video class='w-75' controls>

                                                <source src='${item.video}'></source>

                                            </video>` : ''

                                        }



                                    </div>

                                </div>

                            `)

                        })

                        $("#relevant_questions_pagination").pagination({

                            items: parseInt(data.total),

                            itemsOnPage: parseInt(data.per_page),

                            currentPage: data.current_page,

                            displayedPages: 3,

                            navStyle: "pagination justify-content-center justify-content-md-start",

                            listStyle: "page-item",

                            linkStyle: "page-link",

                            onPageClick: function (pageNumber, event) {

                                event ? event.preventDefault() : '';

                                getQuestion(pageNumber);

                            },

                        });
                    }
                    else
                    {
                        $("#relevant_questions").html("<h5 class='p-2 text-center'>No Data Found</h5>")
                        $("#relevant_questions_pagination").html('')
                    }
                    

                }

            }).always(()=> hideLoader())

        }

        $(function(){
            $("#filter_form").on('submit', function(e){
                e.preventDefault();
                getQuestion(1, {filters: $(this).serialize()})
            })
            $("#form_clear").click(function(){
                $("#filter_form")[0].reset();
                $("#family_filter").select2("val", " ")
                $("#difficulty_level_filter").select2("val", " ")
                filters = ''
                getQuestion(1)
            })
        })


    </script>


</body>



</html>