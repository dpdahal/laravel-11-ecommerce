<?php
if (!isset($dash))
    $dash = '-';
else
    $dash .= '-';
?>

@foreach($childDataTable as $child)
    @if($child->child)
        <tr>

            <td>{{$dash}} {{$child->name}}</td>
            <td>{{$category->postedBy->name}}</td>
            <td>{{$category->created_at->diffForHumans()}}</td>

            <td>
                @can('job_categories_show')
                    <a href="{{route('manage-job-category.show',$child->id)}}" class="btn btn-primary btn-sm">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                @endcan
                @can('job_categories_edit')
                    <a href="{{route('manage-job-category.edit',$child->id)}}" class="btn btn-success btn-sm">
                        <i class="bi bi-pencil-square"></i></a>
                @endcan
            </td>

        </tr>
            <?php $dash .= '-'; ?>
            <?php $dash = substr($dash, 0, -1); ?>
    @endif

    @include('backend.pages.job.category.manageChild',['childDataTable' => $child->child])

@endforeach
