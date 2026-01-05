<table border="1" cellpadding="6">
    <tr>
        <th>Kriteria</th>
        <th>Bobot</th>
    </tr>

    @foreach($weights as $index => $value)
        <tr>
            <td>C{{ $index+1 }}</td>
            <td>{{ number_format($value, 3) }}</td>
        </tr>
    @endforeach
</table>
