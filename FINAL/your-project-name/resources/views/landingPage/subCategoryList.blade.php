{{-- 
@foreach($subcategories as $subcategory)
<ul>
   <li>{{$subcategory->name}}</li> 
 @if(count($subcategory->subcategory))
   @include('landingPage.subCategoryList',['subcategories' => $subcategory->subcategory])
 @endif
</ul> 
@endforeach --}}

@foreach($subcategories as $subcategory)
<ul >
   <li><a href="{{ route('landingPage.index',['category_id'=>$subcategory->id]) }}" class="dropdown-item">{{$subcategory->name}}</a></li> 
 @if(count($subcategory->subcategory))
   @include('landingPage.subCategoryList',['subcategories' => $subcategory->subcategory])
 @endif
</ul> 
@endforeach
