@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task Status Chart</h2>
    <canvas id="taskChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('taskChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Completed', 'Pending'],
            datasets: [{
                label: 'Task Status',
                backgroundColor: ['#28a745', '#ffc107'],
                data: [{{ $completedData[0] }}, {{ $incompleteData[0] }}]
            }]
        },
    });
</script>
@endsection
