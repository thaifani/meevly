@foreach ($category as $id => $attrs)
	<div class="list-group-item list-group-item-action" style="padding-left: {{ $indent }}px;">
		<a href="{{ url('tutorials-categories/' . $id .'/edit') }}">{{ $attrs['name'] }}</a>

		<span class="float-right ml-3">
			<form action="{{ route('tutorials-categories.destroy', $id) }}" method="POST" class="mb-0">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button class="btn" aria-hidden="true">
					<i class="pl-2 fa fa-trash font-icon"></i>
					Trinti
				</button>
			</form>
			
		</span>
	</div>

	@if (!empty($categories[$id]))
		@php
		$nextindent = $indent + 20;
		@endphp

		@include('tutorials-categories/recursive-item', array('category' => $categories[$id], 'categories' => $categories, 'indent' => $nextindent ))

	@endif
@endforeach
