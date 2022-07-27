    @if ($paginator->lastPage() > 1)
        <ul class="pagination">
            <li class="">
                @if ($paginator->currentPage() == 1)
                    <label class="disabled">Назад</label>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="text-blue-500">Назад</a>
                @endif
            </li>
            <li class="{{ $paginator->currentPage() == 1 ? 'font-bold text-black' : 'text-blue-500' }} mx-2">
                <a href="{{ $paginator->url(1) }}">1</a>
            </li>
            <?php
            $half_total_links = 5;
            $from = $paginator->currentPage() - $half_total_links < 2 ? 2 : $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links > $paginator->lastPage() ? $paginator->lastPage() : $paginator->currentPage() + 5;
            if ($from > $paginator->lastPage() - $link_limit) {
                $from = $paginator->lastPage() - $link_limit + 1;
                $to = $paginator->lastPage();
            }
            if ($to <= $link_limit) {
                $from = 1;
                $to = $link_limit < $paginator->lastPage() ? $link_limit : $paginator->lastPage();
            }
            ?>

            @for ($j = 2; $j >= 1; $j--)
                @for ($i = 3; $i >= 1; $i--)
                    <?php
                    $page = $paginator->currentPage() - pow(10, $j) * $i;
                    ?>
                    @if ($page > 1)
                        <li class="text-blue-500 mx-2">
                            <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endfor
            @endfor
            @for ($i = $from; $i <= $to; $i++)
                <li class="{{ $paginator->currentPage() == $i ? 'font-bold text-black' : 'text-blue-500' }} mx-2">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            @for ($j = 1; $j <= 2; $j++)
                @for ($i = 1; $i <= 3; $i++)
                    <?php
                    $page = $paginator->currentPage() + pow(10, $j) * $i;
                    ?>
                    @if ($page < $paginator->lastPage())
                        <li class="text-blue-500 mx-2">
                            <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
                        </li>
                    @endif
                @endfor
            @endfor
            <li
                class="{{ $paginator->currentPage() == $paginator->lastPage() ? 'font-bold text-black' : 'text-blue-500' }} mx-2">
                <a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
            </li>
            <li class="{{ $paginator->currentPage() == $paginator->lastPage() ? ' disabled' : '' }}">
                @if ($paginator->currentPage() == $paginator->lastPage())
                    <label class="disabled">Вперед</label>
                @else
                    <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="text-blue-500">Вперед</a>
                @endif
            </li>
        </ul>
    @endif
