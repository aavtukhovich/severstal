    @if ($paginator->lastPage() > 1)
        <ul class="pagination">
            <li class="">
                @if($paginator->currentPage() == 1)
                <label class="disabled">Назад</label>
                @else
                <a href="{{ $paginator->url($paginator->currentPage() -1) }}" class="text-blue-500">Назад</a>
                @endif
             </li>
             <li class="{{ ($paginator->currentPage() == 1) ? 'font-bold text-black' : 'text-blue-500' }} mx-2">
                <a href="{{ $paginator->url(1) }}">1</a>
            </li>
             <?php
                $half_total_links = 5;
                $from = ($paginator->currentPage() - $half_total_links) < 2 ? 2 : $paginator->currentPage() - $half_total_links;
                $to = ($paginator->currentPage() + $half_total_links) > $paginator->lastPage() ? $paginator->lastPage() : ($paginator->currentPage() +5);
                if ($from > $paginator->lastPage() - $link_limit) {
                   $from = ($paginator->lastPage() - $link_limit) + 1;
                   $to = $paginator->lastPage();
                }
                if ($to <= $link_limit) {
                    $from = 1;
                    $to = $link_limit < $paginator->lastPage() ? $link_limit : $paginator->lastPage();
                }
            ?>
            @for ($i = $from; $i <= $to; $i++)
                    <li class="{{ ($paginator->currentPage() == $i) ? 'font-bold text-black' : 'text-blue-500' }} mx-2">
                        <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
            @endfor
            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? 'font-bold text-black' : 'text-blue-500' }} mx-2">
                <a href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
            </li>
            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                @if($paginator->currentPage() == $paginator->lastPage())
                <label class="disabled">Вперед</label>
                @else
                <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="text-blue-500">Вперед</a>
                @endif
            </li>
        </ul>
    @endif

