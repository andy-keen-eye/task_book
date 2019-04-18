<div class="container paginator">
<ul class="pagination">
<?php
if ($values[1] == 1)
{
    echo ('<li class="disabled"><span>&laquo;</span></li>
        <li class="active"><span>1</span></li>');
}
elseif ($values[1] == 2)
{
    echo ('<li><a href="?page='.($values[1] -1).'" rel="prev">&laquo;</a></li>
        <li><a href="?page='.($values[1] -1).'">'.($values[1] -1).'</a></li>
        <li class="active"><span>2</span></li>');
}
elseif ($values[1] > 2)
{
    echo ('<li><a href="?page='.($values[1] -1).'" rel="prev">&laquo;</a></li>
        <li><a href="?page='.($values[1] - 2).'">'.($values[1] - 2).'</a></li>
        <li><a href="?page='.($values[1] - 1).'">'.($values[1] - 1).'</a></li>
        <li class="active"><span>'.($values[1]).'</span></li>');
}

if ($values[2] == 1)
{
    echo ('<li class="disabled"><span>&raquo;</span></li>');
}
elseif ($values[2] == 2)
{
    echo ('<li><a href="?page='.($values[1] + 1).'">'.($values[1] + 1).'</a></li>
        <li><a href="?page='.($values[1] + 1).'" rel="next">&raquo;</a></li>');
}
elseif ($values[2] == 3)
{
    echo ('<li><a href="?page='.($values[1] + 1).'">'.($values[1] + 1).'</a></li>
        <li><a href="?page='.($values[1] + 2).'">'.($values[1] + 2).'</a></li>
        <li><a href="?page='.($values[1] + 1).'" rel="next">&raquo;</a></li>');
}

?>
</ul>
</div>