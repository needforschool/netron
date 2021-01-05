<?php
session_start();
print_r($_SESSION);
// session_destroy();
?>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
    }
</style>
<table style="width:100%">
    <tr>
        <th>Date</th>
        <th>Version</th>
        <th>Header Length</th>
        <th>Service</th>
        <th>Identification</th>
        <th>Flags Code</th>
        <th>TTL</th>
        <th colspan="4">Protocol</th>
        <th>Header Check Sum</th>
        <th colspan="2">IP</th>
    </tr>
    <tr>
        <th colspan="7"></th>
        <th>Name</th>
        <th>Check Sum</th>
        <th colspan="2">Ports</th>
        <th></th>
        <th>From</th>
        <th>Dest</th>
    </tr>
    <tr>
        <th colspan="9"></th>
        <th>From</th>
        <th>Dest</th>
        <th colspan="3"></th>
    </tr>
    <tr>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
        <td>Example</td>
    </tr>
</table>