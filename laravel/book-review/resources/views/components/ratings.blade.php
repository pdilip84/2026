<div>
    @if ($thisrating > 0)
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= floor($thisrating))
                <span class="text-yellow-500">&#9733;</span> <!-- Full star -->
            @elseif ($i - $thisrating < 1)
                <span class="text-yellow-500">&#9733;</span> <!-- Half star -->
            @else
                <span class="text-gray-300">&#9733;</span> <!-- Empty star -->
            @endif
        @endfor
    @endif
</div>
