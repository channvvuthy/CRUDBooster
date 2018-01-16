@extends('crudbooster::admin_template')
@section('content')
    <div>

        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </a></p>
            @endif
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title or "Page Title" !!}
                </strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = (@$row)?CRUDBooster::mainpath("edit-save/$row->id"):CRUDBooster::mainpath("add-save");
                $return_url = ($return_url)?:g('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data"
                      action='{{$action}}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                    @if($hide_form)
                        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                    @endif
                    <div class="box-body" id="parent-form-area">
                        <div id="exTab1">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#1a" data-toggle="tab">General</a>
                                </li>
                                <li><a href="#2a" data-toggle="tab">Data</a>
                                </li>
                                <li><a href="#3a" data-toggle="tab">Link</a>
                                </li>
                                <li><a href="#4a" data-toggle="tab">Variation</a>
                                </li>
                            </ul>

                            <div class="tab-content clearfix">
                                <div class="tab-pane active" id="1a">
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Name <span class="text-danger"
                                                                                         title="This field is required">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" title="Name" required="" placeholder="" maxlength="70"
                                                   class="form-control" name="name" id="name" value="">
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Description <span class="text-danger"
                                                                                                title="This field is required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control" rows="5"></textarea>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Full Description <span class="text-danger"
                                                                                                     title="This field is required">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea name="full_description" id="" cols="30" class="editor"
                                                      rows="10"></textarea>
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="2a">
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Model</label>
                                        <div class="col-sm-7">
                                            <input type="text" title="Name" required="" placeholder="" maxlength="70"
                                                   class="form-control" name="name" id="name" value="">
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Price <span class="text-danger"
                                                                                          title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" title="Name" required="" placeholder="" maxlength="70"
                                                   class="form-control" name="name" id="name" value="">
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Quantity <span class="text-danger"
                                                                                             title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" title="Name" required="" placeholder="" maxlength="70"
                                                   class="form-control" name="name" id="name" value="">
                                            <div class="text-danger"></div>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Status <span class="text-danger"
                                                                                           title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <select name="" id="" class="form-control">
                                                <option value="1">Enabled</option>
                                                <option value="0">Disabled</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Requires Shipping <span
                                                    class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <label class="radio-inline">
                                                <input type="radio" name="shipping">Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="shipping">No
                                            </label>

                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2"> Shipping Methods <span
                                                    class="text-danger" title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value=""> Free Shipping
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="">Other
                                            </label>


                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2">Images <span class="text-danger"
                                                                                           title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="file" name="images" id="images" class="form-control" multiple>
                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane" id="3a">
                                    @php
                                        $categories=DB::table('categories')->where('status','1')->get();@endphp
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2"> Category<span class="text-danger"
                                                                                             title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <select name="categories_id" id="categories" class="form-control">
                                                <option value="">Select Category</option>
                                                @if(!empty($categories))
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group header-group-0 " id="form-group-name" style="">
                                        <label class="control-label col-sm-2"> Sub Category <span class="text-danger"
                                                                                                  title="This field is required">*</span></label>
                                        <div class="col-sm-7">
                                            <select name="sub_categories_id" id="sub_categories_id"
                                                    class="form-control">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="4a">
                                    <h3>We use css to change the background color of the content to be equal to the
                                        tab</h3>
                                </div>
                            </div>
                        </div>


                        <!-- Bootstrap core JavaScript
                            ================================================== -->
                        <!-- Placed at the end of the document so the pages load faster -->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                        <script src="{{asset('vendor/crudbooster/assets/summernote/summernote.js')}}"></script>
                        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                        <link rel="stylesheet" href="{{asset('vendor/crudbooster/assets/summernote/summernote.css')}}">

                    </div><!-- /.box-body -->

                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                    @if(g('return_url'))
                                        <a href='{{g("return_url")}}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}
                                        </a>
                                    @else
                                        <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}'
                                           class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}
                                        </a>
                                    @endif
                                @endif
                                @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                                    @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                        <input type="submit" name="submit"
                                               value='{{trans("crudbooster.button_save_more")}}'
                                               class='btn btn-success'>
                                    @endif

                                    @if($button_save && $command != 'detail')
                                        <input type="submit" name="submit" value='{{trans("crudbooster.button_save")}}'
                                               class='btn btn-success'>
                                    @endif

                                @endif
                            </div>
                        </div>
                    </div><!-- /.box-footer-->

                </form>

            </div>
        </div>
    </div><!--END AUTO MARGIN-->
    <script type="text/javascript">
        $(".editor").summernote({height: 250});
        $("#categories").on("change", function (e) {
            var categories_id = $(this).val();
            jQuery.ajax({
                url: "{{route('get_sub_categories')}}",
                type: "GET",
                dataType: "html",
                data: {categories_id: categories_id},
                success: function (data) {
                    $("#sub_categories_id").html(data);
                }
            });
        });
        $(document).on("change","#sub_categories_id",function (e) {
              jQuery.ajax({
                  url:""
              })
        });
    </script>
@endsection
