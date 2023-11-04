<div class="card card-widget mb-1">
	<div class="card-body">
		Page ID: <b>{{ $page->id }}</b>, &nbsp;
		Page Title: <b> {{ $page->page_title }}</b>, &nbsp;
		Route Name: <b> {{ $page->route_name }}</b>, &nbsp;
		Active: <b>{{ $page->active ? 'Yes' : 'No' }}</b>,
		Left Sidebar: <b>{{ $page->left_sidebar ? 'Yes' : 'No' }}</b>,
		List In Menu: <b>{{ $page->list_in_menu ? 'Yes' : 'No' }}</b>,
		Title Hide: <b>{{ $page->title_hide ? 'Yes' : 'No' }}</b>,

		Parts: <b> <span
				class="label {{ $page->items()->whereActive(true)->count() ? 'label-success' : 'label-danger' }} ">
				{{ $page->items()->whereActive(true)->count() }}
			</span> </b>



		<div class="text-right">

			<a class="btn  btn-xs btn-primary" target="_blank"
				href="{{ route('page',$page->route_name) }}">Preview Page</a> &nbsp;

			<a class=" btn-primary btn btn-xs " href="{{ route('admin.pageEdit', $page) }}">Page Edit</a>
			&nbsp;
			<a class="btn-primary btn btn-xs " href="{{ route('admin.pageItems', $page) }}">Add Page Part</a>

		</div>
	</div>
</div>