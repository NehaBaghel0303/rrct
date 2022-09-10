@extends('backend.layouts.main') 
@section('title', 'Support Tickets')

@php
    $breadcrumb_arr = [
         ['name'=>'Support Tickets', 'url'=> "javascript:void(0);", 'class' => 'active']
        ]
@endphp

@section('content')
    <style>
        .chat{
            border: none;
            border-radius: 5px;
            padding: 0.5em;
        }
        .chat-left{
            align-self: flex-start;
            background-color: rgb(244, 244, 244);
            }
        .chat-right{
            text-align: right;
            align-self: flex-end;
            }
        .address-check{
            position: absolute;
            top: 0;
            right: 5px;
            }
        .scroll {
            max-height: 270px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        .sticky-bar { 
            position: sticky; 
            top: 80px; 
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>{{getSupportTicketPrefix($support_ticket->id) }} </h3>
                        @if (AuthRole() == 'Admin')     
                            <div class="d-flex">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ getSupportTicketStatus($support_ticket->status)['name'] }}<i class="ik ik-chevron-right"></i></button>
                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                        @foreach (getSupportTicketStatus() as $status)
                                            @if ($support_ticket->status != $status['id'])
                                                <li class="dropdown-item p-0">
                                                    <a href="{{ route('panel.constant_management.support_ticket.status',[$support_ticket->id, $status['id']]) }}" title="Update Status" class="btn btn-sm confirm-btn">{{ $status['name'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div>
                                @if($support_ticket->status == 1 || $support_ticket->status == 0)
                                    <a href="{{ route('panel.constant_management.support_ticket.status',[$support_ticket->id, 2]) }}" class="btn btn-success btn-sm confirm-btn">Start Working</a>
                                @else 
                                    @if($support_ticket->status != 3 && $support_ticket->status != 4 && $support_ticket->status != 5) 
                                        <a href="{{ route('panel.constant_management.support_ticket.status',[$support_ticket->id, 3]) }}" class="btn btn-success btn-sm confirm-btn" >Mark Work Completed</a>
                                    @endif
                                @endif
                                <span class="badge badge-{{ getSupportTicketStatus($support_ticket->status)['color'] }}">{{ getSupportTicketStatus($support_ticket->status)['name'] }}</span>
                            </div>
                        @endif
                    </div>
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#conversations" role="tab1" aria-controls="pills-profile" aria-selected="false">{{ __('Conversations')}}</a>
                        </li>
                        @if (AuthRole() == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" id="pills-work-tab" data-toggle="pill" href="#workReport" role="tab2" aria-controls="pills-profile" aria-selected="false">{{ __('Work Report')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-customer-tab" data-toggle="pill" href="#customerReport" role="tab3" aria-controls="pills-profile" aria-selected="false">{{ __('Customer Report')}}</a>
                        </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="conversations" role="tab1" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                <div class="">
                                    <div class="card-body scroll">
                                        <div class="row my-1 chat">
                                            <div class="col-md-11 py-2 chat-left mb-1">
                                                <div class="p-0 m-0">
                                                    <p class="mb-0">
                                                        <strong>{{ $support_ticket->subject ?? "N\A" }}</strong>
                                                        <br><i class="ik ik-user"></i>{{ fetchFirst('App\User',$support_ticket->user_id,'first_name',' ') }} {{ fetchFirst('App\User',$support_ticket->user_id,'last_name',' ') }}
                                                            <br><i class="ik ik-mail"></i> {{ Str::limit($support_ticket->message,70) }},<br>
                                                        <small class="text-muted">{{ getFormattedDate($support_ticket->created_at) }}</small>
                                                </div>
                                            </div>
                                            @foreach (App\Models\TicketConversation::where('type_id',$support_ticket->id)->get() as $index => $item)
                                                @if ($item->user_id == auth()->id())
                                                    <div class="col-md-11 py-2 chat-right mb-1">
                                                            <div class="p-0 m-0">
                                                                <span>
                                                                    {{  $item->comment }}
                                                                </span>
                                                            </div>
                                                            <small class="text-muted">{{ getFormattedDate($item->created_at) }}</small>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <a href="{{ route('panel.constant_management.ticket_conversation.delete', $item->id) }}" title="Delete Enquiry" class="btn mt-2 btn-sm btn-icon btn-outline-danger delete-item" style="display: flex;align-items: center;justify-content: center;"><i class="ik ik-trash"></i></a>
                                                    </div>
                                                @else
                                                    <div class="col-md-11 py-2 chat-left mb-1">
                                                            <div class="p-0 m-0">
                                                                <span>
                                                                    {{  $item->comment }}
                                                                </span>
                                                            </div>
                                                            <small class="text-muted">{{ getFormattedDate($item->created_at) }}</small>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div> 
                                        <div class="msg-card"></div>
                                    </div>
                                    <div class="card-footer">
                                        
                                            @if($sender != auth()->id())
                                            <div class="alert alert-info mb-0"><strong>Note:</strong> You don't have permission to send messsage to this enquiry</div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">   
                                                    <form action="{{ route('panel.admin.ticket_conversation.store') }}" method="post" class="ChatForm">                                 
                                                        @csrf
                                                        <input type="hidden" name="type_id" value="{{ $support_ticket->id }}" id="groupId">
                                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}" >
                                                        <input type="hidden" name="type" value="{{ 'Support Ticket' }}">
                                                        <input type="hidden" name="reciever_id" value="{{ $receiver }}" id="receiverId">
                                                        <div class="d-flex align-items-center {{ $errors->has('comment') ? 'has-error' : ''}}">
                                                            {{-- <textarea class="form-control" rows="2" name="comment" id="message" type="textarea" placeholder="Send Your Reply" required>{{ isset($support_ticket->comment) ? $support_ticket->comment : ''}}</textarea> --}}
                                                            <input type="text" class="form-control" required name="comment" id="message" placeholder="Enter Message">
                                                            <div class="ml-2">
                                                                <button type="submit" class="btn btn-primary btn-icon"><i class="ik ik-navigation"></i></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (AuthRole() == 'Admin')
                        <div class="tab-pane fade" id="workReport" role="tab2" aria-labelledby="pills-work-tab">
                            <div class="card-body">
                                <textarea name="agent_remark"class="form-control"placeholder="Enter here..." id="" cols="3" rows="5">{{ $support_ticket->agent_remark }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="customerReport" role="tab3" aria-labelledby="pills-customer-tab">
                            <div class="card-body">
                                <textarea name="customer_remark"class="form-control"placeholder="Enter here..." id="" cols="3" rows="5">{{ $support_ticket->customer_remark }}</textarea>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="card mb-3">
                        <div class="card-body"> 
                            <div class="d-flex justify-content-left">
                                <div class="mt-2">
                                    <i class="text-muted mb-2 fa fa-user fa-lg"></i>
                                </div>
                                <div class="ml-3">
                                    <small class="text-muted d-block pt-0">{{ __('Agent Name')}} </small>
                                    <h6>{{ fetchFirst('App\User',$support_ticket->assign_to,'first_name','') }} {{ fetchFirst('App\User',$support_ticket->assign_to,'last_name','') }}</h6> 
                                    <small class="text-muted d-block pt-0">{{ __('Email address')}} </small>
                                    <h6>{{ fetchFirst('App\User',$support_ticket->assign_to,'email','--') }}</h6> 
                                    <small class="text-muted d-block">{{ __('Phone')}}</small>
                                    <h6>{{ fetchFirst('App\User',$support_ticket->assign_to,'phone','--') }}</h6> 
        
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-left">
                                <div class="mt-2">
                                    <i class="text-muted mb-2 fa fa-user-circle fa-lg"></i>
                                </div>
                                <div class="ml-3">
                                    <small class="text-muted d-block pt-0">{{ __('Customer Name')}} </small>
                                    <h6>{{ fetchFirst('App\User',$support_ticket->user_id,'first_name',' ') }} {{ fetchFirst('App\User',$support_ticket->user_id,'last_name',' ') }}</h6> 
                                    <small class="text-muted d-block pt-0">{{ __('Email address')}} </small>
                                    <h6>{{ fetchFirst('App\User',$support_ticket->user_id,'email','--') }}</h6> 
                                    <small class="text-muted d-block">{{ __('Phone')}}</small>
                                    <h6>{{ fetchFirst('App\User',$support_ticket->user_id,'phone','--') }}</h6> 
        
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @if(AuthRole() == 'Agent')
                <div class="col-md-12 col-lg-12">
                    @if($support_ticket->status == 3)
                        <form action="{{ route('panel.constant_management.support_ticket.agent-remark')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $support_ticket->id }}" name="id">
                            <div class="card mb-3">
                                <div class="card-header"style="background-color: #d9d9d9">
                                    <h3>Work Report</h3>
                                </div>
                                <div class="card-body" style="200px;">
                                    <textarea rows="5" name="agent_remark" id=""class="form-control" placeholder="Enter here...">{{ $support_ticket->agent_remark }}</textarea>
                                </div>
                                <div class="card-footer text-right ">
                                    <button type="submit"class="btn btn-primary btn-block">Submit Your Report</button>
                                </div>
                            </div>
                        </form>
                    @elseif($support_ticket->status == 4)   
                        <div class="alert alert-info">
                            <p class="mb-0">You have submitted the report</p>
                        </div>
                    @endif    
                </div>
                @endif
                @if(Auth::id() == $support_ticket->user_id && $support_ticket->status == 5)
                    <div class="col-md-12 col-lg-12">
                        <form action="{{ route('panel.constant_management.support_ticket.customer-remark')}}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $support_ticket->id }}" name="id">
                            <div class="card">
                                <div class="card-header"style="background-color: #d9d9d9">
                                    <h3>Share Experience</h3>
                                </div>
                                <div class="card-body">
                                    <textarea name="customer_remark" id=""class="form-control" placeholder="Enter here...">{{ $support_ticket->customer_remark }}</textarea>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit"class="btn btn-primary btn-block">Submit Your Experience</button>
                                </div>
                            </div>
                            </form>
                    </div>
                @endif
                </div>
            </div> 
        </div>
    </div>
    <script>
        $(document).on('click','.confirm-btn',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            var msg = $(this).data('msg') ?? "You won't be able to revert back!";
            $.confirm({
                draggable: true,
                title: 'Are You Sure!',
                content: msg,
                type: 'red',
                typeAnimated: true,
                buttons: {
                    tryAgain: {
                        text: 'Confirm',
                        btnClass: 'btn-info',
                        action: function(){
                                window.location.href = url;
                        }
                    },
                    close: function () {
                    }
                }
            });
        });
    </script>
@endsection
