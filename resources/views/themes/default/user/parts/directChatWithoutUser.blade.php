<div class="row">
  <div class="col-md-12 text-center">
    <div class="row flex-inline-block d-flex justify-content-center">
      <div class="col-md-5">
        <!-- DIRECT CHAT DANGER -->
        <div class="card card-danger direct-chat direct-chat-danger">
          <div class="card-header">
            <h3 class="card-title">No User to Chat</h3>
            <div class="card-tools">
              <span title="3 New Messages" class="badge">{{ Auth::user()->unreadMsgUsersCount() }}</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                <i class="fas fa-comments"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <!-- Message. Default to the left -->


              <!-- /.direct-chat-msg -->
            </div>
            <!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                @foreach(Auth::user()->messageContacts() as $c)

                @if($c->userfrom_id == Auth::id())
                <li>
                  <a href="{{ route('user.messageDashboard', $c->userto_id) }}">
                    <img class="contacts-list-img" src="{{ asset($c->userTo->pp()) }}" alt="{{ $c->userTo->name }}">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        {{ $c->userTo->name }}
                        <small class="contacts-list-date float-right">{{ $c->created_at }}</small>
                      </span>
                      <span class="contacts-list-msg">{{ Str::limit($c->message, 20) }}</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                @else
                <li>
                  <a href="{{ route('user.messageDashboard', $c->userto_id) }}">
                    <img class="contacts-list-img" src="{{ asset($c->userTo->pp()) }}" alt="{{ $c->userTo->name }}">

                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        {{ $c->userFrom->name }}
                    @if (!$c->read)
                    <i class="fa fa-circle"></i>

                    @endif

                        <small class="contacts-list-date float-right">{{ $c->created_at }}</small>
                      </span>
                      <span class="contacts-list-msg">{{ Str::limit($c->message, 20) }}</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                @endif
                @endforeach

                <!-- End Contact Item -->
              </ul>
              <!-- /.contatcts-list -->
            </div>
            <!-- /.direct-chat-pane -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-append">
                  <button type="submit" class="btn btn-danger" disabled>Send</button>
                </span>
              </div>
            </form>
          </div>
          <!-- /.card-footer-->
        </div>
        <!--/.direct-chat -->
      </div>

    </div>
  </div>
  <!-- /.col -->
</div>
