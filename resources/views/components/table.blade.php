
<tbody>
    @foreach($data as $item)
        <tr>
            <td>
                {{$item->id}}
            </td>
            <td>
                {{$item->name}}
            </td>
            @if($item->categoryParent!=null)
            <td>
                {{$item->categoryParent->name}}
            </td>
            @else
            <td>
                None
            </td>
            @endif
        </tr>
    @endforeach
</tbody>