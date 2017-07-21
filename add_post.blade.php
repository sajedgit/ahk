@extends('layouts.maestro')
@section('title', 'Add Post')

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.css"
      rel="stylesheet">

@section('content')

    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.6/summernote.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.js"></script>

    <style>
        .tableOuter {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .form-control {
            padding-bottom: 10px;
        }

        label {
            padding-top: 20px;
        }

        .centerPosition {
            text-align: center;
        }

        .positionRight {
            text-align: right;
        }

        .input-group-addon {
            padding: 3px 6px;
            color: rgb(255, 255, 255);
            background-color: rgb(94, 137, 242);
            line-height: 30px;
            width: 30px;;
            border-radius: 5px !important;
            cursor: pointer;
        }

        .input-group .form-control {
            width: 96%;
        }

        .form-control {
            border-radius: 5px !important;
            border: 2px solid #8f9ba6;


        }
        .form-group select{
            height: 38px !important;
        }

        .titleHead {
            padding-left: 10px;
            margin-bottom: 0;
        }

        .editMetaDataLink{
            float: right;
            padding: 20px 20px 0 0;
        }
    </style>

    {{--<div class="row editMetaDataLink">
        <a href="#editMetaDataModal" rel="modal:open"> Edit Metadata</a>
    </div>--}}

    <form method="POST" id="updatePost" action="/posts/{{$postData->post_id}}">

        <input name='_token' type='hidden' value='{{csrf_token()}}'>
        <input name='_method' type='hidden' value='PUT'>
        <div class="row">
            <h2 class="titleHead">Post Content</h2>

            <div class="tableOuter">
                <!--color-->
                <div class="col-md-5">
                    {{--<div class="col-md-4">--}}
                    {{--<label> Primary Color</label>--}}
                    {{--<div class="input-group ">--}}
                    {{--<input type="text" class="form-control cp">--}}
                    {{--<span class="input-group-addon colorpicker-element"><i class="material-icons " title="Color Picker">format_color_fill</i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                    {{--<label>Secondary Color</label>--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control cp">--}}
                    {{--<span class="input-group-addon colorpicker-element"><i class="material-icons" title="Color Picker">format_color_fill</i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4">--}}
                    {{--<label>Tertiary Color</label>--}}
                    {{--<div class="input-group">--}}
                    {{--<input type="text" class="form-control cp">--}}
                    {{--<span class="input-group-addon colorpicker-element"><i class="material-icons" title="Color Picker">format_color_fill</i></span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    <input type="hidden" value="{{$postData->post_id}}" name="post_id">

                    <div class="col-md-12">
                        <label>Post Image</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="post_image" value="{{$postData->post_image}}">
                            <span class="input-group-addon"> <i class="material-icons" title="Image Picker">photo_size_select_actual</i></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label>News Feed Text</label>
                        <textarea name="news_feed_text" class="form-control">{{$postData->news_feed_text}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label>News Feed Link Text</label>
                        <input type="text" name="news_feed_link_text" class="form-control" value="{{$postData->news_feed_link_text}}">
                    </div>
                    <div class="col-md-12">
                        <label>News Feed Link URL</label>
                        <input type="text" name="news_feed_link_url" class="form-control" value="{{$postData->news_feed_link_url}}">
                    </div>
                    <div class="col-md-12">
                        <label class="checkbox-inline"><input type="checkbox" @if($postData->allow_like) checked @endif name="allow_like" >Allow Likes</label>
                        <label class="checkbox-inline"><input type="checkbox" @if($postData->allow_comment) checked @endif name="allow_comment" >Allow Comments</label>
                        <label class="checkbox-inline"><input type="checkbox" @if($postData->add_to_calendar_link) checked @endif name="add_to_calendar_link">Include "Add to Calendar" link</label>
                    </div>
                </div>

                <!--image-->
                <div class="col-md-6">
                    <div class="row">
                        <label class="checkbox-inline"><input type="checkbox" value="">Include Full-Screen Text</label>
                        <div id="summernote">{{$postData->post_message}}</div>
                        <textarea id="post_message" name="post_message" style="display: none" ></textarea>
                    </div>
                    <div class="row centerPosition">
                        <a href="#postMessagePreview1" rel="modal:open" type="button" class="primaryBtn">Preview</a>
                    </div>

                </div>
            </div>
        </div>

        <!--Audience-->
        <div class="row">
            <h2 class="titleHead">Select Audience</h2>

            <div class="tableOuter">
                <!-- table view-->
                <div class="col-md-6">
                    <table class="table table-striped" id="audienceListTable">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Audience Name</th>
                            <th>Admin</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($audienceList as $a)
                        <tr>
                            {{--<td><input class="selectAudience" type="checkbox" id="id_{{$a->inview_usergroup_id}}" name="audience"></td>--}}
                            {{--<td id="name_{{$a->inview_usergroup_id}}" class="group_name">{{$a->group_name}}</td>--}}
                            {{--<td>{{$a->created_by}}</td>--}}
                            <td><input class="selectAudience" type="checkbox" id="id_1" name="audience"></td>
                            <td id="name_1" class="group_name">aaa</td>
                            <td>admin</td>
                        </tr><tr>
                             <td><input class="selectAudience" type="checkbox" id="id_2" name="audience"></td>
                            <td id="name_2" class="group_name">bbb</td>
                            <td>admin</td>
                        </tr><tr>
                             <td><input class="selectAudience" type="checkbox" id="id_3" name="audience"></td>
                            <td id="name_3" class="group_name">ccc</td>
                            <td>admin</td>
                        </tr>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- select view-->
                <div class="col-md-6">
                    <div class="col-md-4">
                        <label>Select Audience</label>
                        <div id="selectedAudience"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12 positionRight">
            <div id="submission">
                <button type="button" class="primaryBtn cancel" onclick="window.location='';return false;">Cancel</button>
                <button type="button" class="primaryBtn save">Publish</button>
                <button type="submit" id="updatePostBtn" class="primaryBtn save">Save</button>
            </div>
        </div>
    </form>

    <!--edit metadata modal-->
    <div id="editMetaDataModal" style="display: none">
        <form method='PUT' id="updateMetadataForm" action="">
            <legend>Post Metadata</legend>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <span>Name</span>
                        <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="">
                    </div>

                    <div class="form-group">
                        <span>App</span>
                        <select class="form-control" name="app" >
                            <option value="">(None)</option>
                            <option value="1">Health</option>
                            <option value="2">Safety</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <span>Description</span>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-offset-1 col-md-6">
                    <div class="form-group">
                        <div class="col-md-6" style="padding-left:0">
                            <label>Start Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="startDate" name="startDate" value="">
                                <span class="input-group-addon" id="startDateBtn"> <i class="material-icons">date_range</i></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>End Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="endDate" value="">
                                <span class="input-group-addon"> <i class="material-icons">date_range</i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <span>Tags</span>
                        <textarea class="form-control" name="tags" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                         <input type="checkbox" name="sendUrgentPost" value="1">Send as URGENT Post <br>

                         <input type="checkbox" name="sendPushNotification" value="1"> Send Push Notification
                    </div>

                </div>
            </div>

            <div class="col-lg-12 positionRight" style="border-top: 1px dashed #e5e5e5 !important;">
                <div id="submission">
                    <button type="button" class="primaryBtn save" id="saveMetadatBtn">Save</button>
                </div>
            </div>

        </form>
    </div>

    <!--post message preview-->
    <div id="postMessagePreview" style="display: none">
        <legend>Post Metadata</legend>
        <div id="postMessageContentPreview"></div>
    </div>

    <script>

        function array_unique(arr) {
            var result = [];
            for (var i = 0; i < arr.length; i++) {
                if (result.indexOf(arr[i]) == -1) {
                    result.push(arr[i]);
                }
            }
            return result;
        }

        Array.prototype.contains = function(elem)
        {
            for (var i in this)
            {
                if (this[i] == elem) return true;
            }
            return false;
        }

        $(document).ready(function () {


            /// for cloud button ///


            var data_array = new Array();

            $('input[id^="id"]').on('click', function() {

                $(this).attr('checked', true);
                var option_id=this.id;
                var option_id2 = option_id.split('_');
                var selector="name_"+option_id2[1];
                data_array.push(option_id2[1]);

                var unique_arr=array_unique(data_array);console.log(unique_arr.length);
                var value=$("#" + selector ).text();
                var close_btn_id="close_id_"+option_id2[1];
                 console.log("00000---"+unique_arr[0]+"*****"+unique_arr[1]+"****"+unique_arr[2]);

                if(unique_arr.contains(option_id2[1]))
                {console.log("99999---"+unique_arr.indexOf(option_id2[1]));
                    var dynamic_text=" <div id='555' class = 'alert alert-info alert-dismissable'><button type = 'button' class = 'close'  id='"+close_btn_id+"'  data-dismiss = 'alert' aria-hidden = 'true'> &times; </button>"+value+"</div>"
                    $("#selectedAudience").append(dynamic_text);
                }
                else
                    console.log("101010");


                $('button[id^="close_id"]').click(function(){

                    var close_id=this.id;
                    var close_id2 = option_id.split('_');
                    var id_selector="id_"+close_id2[1];console.log(id_selector);
                    $("#" + id_selector).attr('checked', false);

                });
            });


            $('#close_id_1').on('click', function() {
                alert("----"+this.id);

            });


            /// for cloud button //




            /*Set initial variable*/
            var metaDataArray = [];

            /*Color picker*/
            /*$(function () {
                $('.colorpicker-element').colorpicker().on('changeColor', function (e) {
                    var inputField = $(this).parent().find('input');
                    inputField.css({
                        "background-color": e.color.toString('hex'),
                        "color": e.color.toString('hex') != '#ffffff' ? '#ffffff' : '#000000'
                    });
                    inputField.val(e.color.toString('hex'));
                });
            });*/

            /**Text editor*/
            $('#summernote').summernote({
                minHeight: 250
            });

            /*Datatable*/
            $('#audienceListTable').DataTable({
                "bPaginate": false,
                "pageLength": 10
            });

            //start date
            $('#startDate').datepicker();
            $('#startDateBtn').click(function() {
                console.log('1');
                $('#startDate').datepicker('show');
                return false;
            });

            //end date
            $('#endDate').datepicker();
            $('#endDateBtn').click(function() {
                console.log('1');
                $('#endDate').datepicker('show');
                return false;
            });
        });

        /*Post message preview */
        $('#postMessagePreview').click(function (){
            var summernoteValue = $('#summernote').summernote('code');
            $('#postMessageContentPreview').append(summernoteValue);
        });


        /*edit metadata store in array*/
        $("#saveMetadatBtn").click(function (e) {
            e.preventDefault();
            var meta = $("#updateMetadataForm").serializeArray();

            var returnArray = {};
            for (var i = 0; i < meta.length; i++){
                returnArray[meta[i]['name']] = meta[i]['value'];
            }
            metaDataArray = returnArray;
        });

        //update post on submit
        $('#updatePostBtn').click('submit', function (e) {
            var summernoteValue = $('#summernote').summernote('code');
            $('#post_message').val(summernoteValue);

            var url = '/posts/{!!$postData->post_id!!}';
            jQuery.ajax({
                type: "PUT",
                url: url,
                data: $("#updatePost").serialize() + '& _token=' + $('input[name=_token]').val(),
                success: function (data) {
                    console.log(data);
                    var jsonData = $.parseJSON(data);
                    if (jsonData.status == true) {
                        alert(jsonData.msg);
//                        $(location).attr('href','/posts');
                        $(location).attr('href',url+'/edit');
                    }else{

                        alert(jsonData.msg);
                    }
                },
                error: function (error){}
            });
            e.preventDefault();
        });

    </script>
@endsection