<head>
    <style>
        table td {
            padding-left: 5px;
            padding-top: 5px;
            padding-right: 5px;
        }

    </style>
</head>

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            <td colspan="4"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:850px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Date:
                            {{ $date }}</span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="4"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:white">LOAN
                                        SUMMARY</span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px;">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Company Name</span></span>
                </p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>
                    <span style="font-size: 11pt">
                        <span style="font-family: Calibri, sans-serif">
                            {{ $companyName }}
                        </span>
                    </span>
                </p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">ROC No.</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>
                    <span style="font-size: 11pt">
                        <span style="font-family: Calibri, sans-serif">
                            {{ $uen }}
                        </span>
                    </span>
                </p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:34px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Address</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:34px; vertical-align:top; width:514px">
                <p>
                    <span style="font-size: 11pt">
                        <span style="font-family: Calibri, sans-serif">
                            {{ $address }}
                        </span>
                    </span>
                </p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Contact
                            Person</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>
                    <span style="font-size: 11pt">
                        <span style="font-family: Calibri, sans-serif">
                            {{ $contactPerson }}
                        </span>
                    </span>
                </p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:38px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Contact No.</span></span>
                </p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:38px; vertical-align:top; width:514px">
                <p>
                    <span style="font-size: 11pt">
                        <span style="font-family: Calibri, sans-serif">
                            {{ $contactNumber }}
                        </span>
                    </span>
                </p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Email Address</span></span>
                </p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>
                    <span style="font-size: 11pt">
                        <span style="font-family: Calibri, sans-serif">
                            {{ $emailAddress }}
                        </span>
                    </span>
                </p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:6px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Guarantor(s)</span></span>
                </p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:6px; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Origination
                            Fee</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">5%</span></span></p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Loan Tenor</span></span>
                </p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10 months</span></span></p>
            </td>
        </tr>
        <tr>
            <td rowspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Monthly
                            Payable</span></span><br />
                    &nbsp;</p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Interest Rate</span></span>
                </p>

                <p><br />
                    <span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Processing
                            fee</span></span><br />
                    &nbsp;
                </p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">0.70%</span></span></p>

                <p style="text-align:center">&nbsp;</p>

                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">2.3%</span></span></p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>Total</strong></span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>3%</strong></span></span></p>
            </td>
        </tr>
        <tr>
            <td rowspan="5"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Total
                            Exposure</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Current</span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">-</span></span></p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">New</span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">$</span></span></p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>Total</strong></span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>$</strong></span></span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td rowspan="5"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Monthly
                            Instalment</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Current</span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">N/A</span></span></p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">New</span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">$</span></span></p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:148px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>Total</strong></span></span></p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:366px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong><span
                                    style="color:black">$</span></strong></span></span></p>
            </td>
        </tr>
        <tr>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:3px; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td rowspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:139px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Referred by</span></span>
                </p>
            </td>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:250px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Company: </span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:18px; vertical-align:top; width:264px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Consultant: </span></span>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:58px; width:250px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">Nil</span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:58px; width:264px">
                <p style="text-align:center"><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">Nil</span></span></p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:139px">&nbsp;
            </td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:148px">&nbsp;
            </td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:102px">&nbsp;
            </td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:264px">&nbsp;
            </td>
        </tr>
    </tbody>
</table>

<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

{{-- <p>&nbsp;</p> --}}

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td colspan="5"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:850px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:white">LOAN
                                        COMMITMENTS</span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Banks </span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <table cellspacing="0" style="border-collapse:collapse; width:448px">
                    <tbody>
                        <tr>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:70px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span
                                                        style="color:black">Bank</span></span></strong></span></span>
                                </p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:143px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span style="color:black">Loan
                                                        Type</span></span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:78px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span
                                                        style="color:black">Limit</span></span></strong></span></span>
                                </p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:72px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span style="color:black">Mthly
                                                        Instalment</span></span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:85px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span
                                                        style="color:black">Outstanding</span></span></strong></span></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:top; width:70px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:top; width:143px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:70px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:143px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:70px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:143px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:23px; vertical-align:top; width:70px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:23px; vertical-align:top; width:143px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:23px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:23px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:23px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:70px">
                                <p><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong>&nbsp;Total</strong></span></span>
                                </p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:143px">
                                <p><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong>&nbsp;</strong></span></span>
                                </p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:86px; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Alternative Lenders&nbsp;
                        </span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:86px; vertical-align:top; width:514px">
                <table cellspacing="0" style="border-collapse:collapse; width:448px">
                    <tbody>
                        <tr>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:89px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span style="color:black">Financial
                                                        Institution</span></span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:124px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span style="color:black">Loan
                                                        Type</span></span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:78px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span
                                                        style="color:black">Limit</span></span></strong></span></span>
                                </p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:72px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span style="color:black">Mthly
                                                        Instalment</span></span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:16px; vertical-align:top; width:85px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span
                                                        style="color:black">Outstanding</span></span></strong></span></span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:89px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:124px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:25px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:89px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:124px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:29px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:89px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:124px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:24px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:89px">
                                <p><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong>&nbsp;Total</strong></span></span>
                                </p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:124px">
                                <p><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong>&nbsp;</strong></span></span>
                                </p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:78px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:72px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:19px; vertical-align:top; width:85px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p><br />
                    &nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td colspan="3"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:white">CREDIT SUMMARY
                                    </span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Strengths</span></span></p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:38px; vertical-align:top; width:139px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Main Concerns</span></span>
                </p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:38px; vertical-align:top; width:514px">
                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Conclusion</span></span>
                </p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">We are recommending a loan
                            of $ for a tenure of 10 months (P + I)</span></span></p>

                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
    </tbody>
</table>

<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td colspan="5"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span
                                        style="color:white">APPROVAL</span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong>Proposed
                                by:</strong></span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>Signature</strong></span></span></p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Jordan Ho</span></span></p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>&nbsp;</p>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Date:</span></span></p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong>Reviewed
                                by:</strong></span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>Signature</strong></span></span></p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Joey Chin</span></span></p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>&nbsp;</p>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Date:</span></span></p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong>Approved
                                by:</strong></span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><strong>Signature</strong></span></span></p>
            </td>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
        <tr>
            {{-- <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Jeffery Lim</span></span>
                </p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:514px">
                <p>&nbsp;</p>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Date: </span></span></p>
            </td>
            {{-- <td style="border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; width:12px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
        </tr>
    </tbody>
</table>

<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            <td style="border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td>
            <td colspan="3"
                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:none; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            {{-- <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; width:10px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>
            </td> --}}
            <td colspan="2"
                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:black">BORROWER
                                    </span></span></strong></span></span></p>

                {{-- <p>&nbsp;</p> --}}
            </td>
            <td colspan="3"
                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">

                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="5"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:white">LOAN
                                        DETAILS</span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Limit</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">$</span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Structure</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10 equal monthly payments
                            (Principal + Interest)</span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Tenor</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">10 months</span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Interest Rate
                            (p.m.)</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">1.25%</span></span></p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:73px; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Investors&rsquo; Payment
                            Schedule</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:73px; vertical-align:top; width:558px">
                <table cellspacing="0" style="border-collapse:collapse; width:509px">
                    <tbody>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="color:black">Month</span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="color:black">Principal</span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="color:black">Interest</span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="color:black">Total</span></strong></span></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">1</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">2</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">3</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">4</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">5</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">6</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">7</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">8</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">9</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><span
                                                style="color:black">10</span></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="color:black">Total</span></strong></span></span></p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="background-color:white; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:28px; vertical-align:bottom; width:127px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Security</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Personal guarantor of all
                            directors &amp; shareholders.</span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Other
                            Conditions</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Purpose</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:77px; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Source of
                            Repayment</span></span></p>
            </td>
            <td colspan="3"
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:77px; vertical-align:top; width:558px">
                <p style="text-align:justify">&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:10px">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:108px">&nbsp;
            </td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:32px">&nbsp;</td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:514px">&nbsp;
            </td>
            <td style="border-bottom:none; border-left:none; border-right:none; border-top:none; width:12px">&nbsp;</td>
        </tr>
    </tbody>
</table>

<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

{{-- <p>&nbsp;</p> --}}

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            <td colspan="2"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:850px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:white">BORROWER
                                        INFORMATION</span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Background of
                            company</span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p style="text-align:justify">&nbsp;</p>

                <p style="text-align:justify">&nbsp;</p>

                <p style="text-align:justify">&nbsp;</p>

                <p style="text-align:justify">&nbsp;</p>

                <p style="text-align:justify">&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Working Capital
                            Cycle</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Financial
                            Highlights</span></span></p>

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">(latest 3 years including
                            latest mgmt. accounts)</span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>

                <table cellspacing="0" style="border-collapse:collapse; width:514px">
                    <tbody>
                        <tr>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt"><span
                                                        style="color:black">S$&rsquo;000</span></span></strong></span></span>
                                </p>

                                <p>&nbsp;</p>
                            </td>
                            @foreach ($years as $year)
                                <td
                                    style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:123px">
                                    <p style="text-align:center">
                                        <span style="font-size:11pt">
                                            <span style="font-family:Calibri,sans-serif">
                                                <strong>
                                                    <em>
                                                        <span style="font-size:9.0pt">
                                                            <span style="color:black">
                                                                {{ $year }}
                                                            </span>
                                                        </span>
                                                    </em>
                                                </strong>
                                            </span>
                                        </span>
                                    </p>
                                </td>
                            @endforeach
                            {{-- <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:123px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><em><span
                                                        style="font-size:9.0pt"><span style="color:black">Jan 2019
                                                            &ndash; Dec 2019</span></span></em></strong></span></span>
                                </p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:126px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><em><span
                                                        style="font-size:9.0pt"><span style="color:black">Jan 2018
                                                            &ndash; Dec 2018</span></span></em></strong></span></span>
                                </p>
                            </td>
                            <td
                                style="background-color:#d9d9d9; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:126px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><em><span
                                                        style="font-size:9.0pt"><span style="color:black">Jan 2017-Dec
                                                            2018</span></span></em></strong></span></span></p>
                            </td> --}}
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span
                                                    style="font-size:9.0pt">Revenue</span></u></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Turnover</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">NPAT</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span
                                                    style="font-size:9.0pt">Capital</span></u></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">PUC</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Retained Earnings</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span
                                                    style="font-size:9.0pt">Assets</span></u></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Trade Receivables</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Cash at Bank</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Inventory</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Fixed Asset</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Due to/from Director</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:11px; vertical-align:top; width:139px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:11px; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:11px; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:11px; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u><span
                                                    style="font-size:9.0pt">Liabilities</span></u></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Trade payables</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:4px; vertical-align:top; width:139px">
                                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span
                                                style="font-size:9.0pt">Loan outstanding</span></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:4px; vertical-align:top; width:123px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:4px; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:4px; vertical-align:top; width:126px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><u>Comments:</u></span></span></p>

                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Debtor
                            Information</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Creditor
                            Information</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}
                {{-- <p>&nbsp;</p> --}}
            </td>
        </tr>
    </tbody>
</table>

<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

{{-- <p>&nbsp;</p> --}}

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:61px; vertical-align:top; width:117px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Bank Statement
                            Highlights</span></span></p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; height:61px; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><u>Past 6 months&rsquo;
                                data:</u></span></span></p>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Main operating account
                            (SGD)</span></span></p>

                <table cellspacing="0" style="border-collapse:collapse; width:544px">
                    <tbody>
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:136px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt">Month</span></strong></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:136px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt">Total Deposit</span></strong></span></span>
                                </p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:136px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt">Total
                                                    Withdrawal</span></strong></span></span></p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; vertical-align:top; width:136px">
                                <p style="text-align:center"><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong><span
                                                    style="font-size:9.0pt">Month end
                                                    Balance</span></strong></span></span></p>
                            </td>
                        </tr>
                        @foreach ($months as $month)
                            <tr>
                                <td
                                    style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                    <p>
                                        <span style="font-size:11pt">
                                            <span style="font-family:Calibri,sans-serif">
                                                {{ $month }}
                                            </span>
                                        </span>
                                    </p>
                                </td>
                                <td
                                    style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                    <p style="text-align:center">&nbsp;</p>
                                </td>
                                <td
                                    style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                    <p style="text-align:center">&nbsp;</p>
                                </td>
                                <td
                                    style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                    <p style="text-align:center">&nbsp;</p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td
                                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                <p><span style="font-size:11pt"><span
                                            style="font-family:Calibri,sans-serif"><strong>Total</strong></span></span>
                                </p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                            <td
                                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:136px">
                                <p style="text-align:center">&nbsp;</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif"><u>Comments:</u></span></span><br />
                    &nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Bank Loan(s)
                            Commitment</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p style="text-align:justify">&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:59px; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Alternative Lenders&rsquo;
                            Loan(s) Commitment </span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:59px; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:34px; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">SpeedFinance&rsquo;s
                            Exposure</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; height:34px; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Litigation
                            Record</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
    </tbody>
</table>

<div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

<table align="center" cellspacing="0" style="border-collapse:collapse; width:850px">
    <tbody>
        <tr>
            <td colspan="2"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px">
                {{-- <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div>

                <div style="page-break-after: always"><span style="display:none">&nbsp;</span></div> --}}

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span style="color:white">GUARANTOR(S) INFORMATION
                                    </span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">NOA</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span
                            style="font-family:Calibri,sans-serif">FY20:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FY19:
                        </span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Net worth</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">CBS Score</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Risk Grade:<br />
                            Score : Prob of Default between </span></span></p>

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Unsecured Credit Limit:
                        </span></span></p>

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Unsecured Balances Bearing:
                        </span></span></p>

                <p>&nbsp;</p>

                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">(CBS check done
                            on)</span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">MLCB Record</span></span>
                </p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:117px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">Litigation
                            Record</span></span></p>

                <p>&nbsp;</p>
            </td>
            <td
                style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; vertical-align:top; width:558px">
                {{-- <p style="text-align:justify">&nbsp;</p> --}}
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="background-color:black; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px">
                <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span
                                    style="font-size:14.0pt"><span
                                        style="color:white">DISCLAIMER</span></span></strong></span></span></p>

                <p>&nbsp;</p>
            </td>
        </tr>
        <tr>
            <td colspan="2"
                style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; vertical-align:top; width:850px; padding: 5px 5px 0px">
                <p style="text-align:justify">
                    <span style="font-size:11pt">
                        <span style="font-family:Calibri,sans-serif">
                            <span style="font-size:7.0pt">SpeedFinance Pte.
                                Ltd. (the
                                &ldquo;company&rdquo;) which is registered in Singapore (Co. Reg. No.
                                201533158K) is
                                licensed by the Monetary Authority of Singapore (MAS) &ndash; Capital Markets
                                Services
                                (CMS) Licence No. CMS100652-2. In providing its services, the company does not
                                and will
                                not assume any advisory, fiduciary or other duties to participants of its
                                services.
                                Monies placed with us are not, and shall not be, deposits with the company as
                                defined
                                under the Banking Act of Singapore. Neither the company nor any of its
                                directors,
                                officers, employees, representatives, affiliates or agents shall have any
                                liability whatsoever arising, for any error or
                                incompleteness of
                                fact or opinion in, or lack of care in the preparation or publication, of the
                                materials
                                posted on the company&#39;s website. The information gathered on the
                                company&#39;s
                                platform shall be kept in accordance with the Personal Data Protection Act 2012,
                                the
                                company&#39;s Terms &amp; Conditions, and the company&#39;s Personal Data
                                Notice. We
                                have a credit assessment team in place to review every facility request made to
                                us,
                                meaning only established and creditworthy businesses can use our platform to
                                borrow.
                                However, as with all financial investments, lending your money for a return will
                                always
                                have its financial risks. Facilities made on the platform are not insured and
                                there is a
                                risk that a business may not be able to repay the facility. Any past
                                performance,
                                projection, forecast or simulation of results is not necessarily indicative of
                                the
                                future or likely performance of any company or investment. Lenders are
                                responsible for
                                paying all taxes imposed by relevant authorities on any interests received and
                                the
                                amount of tax payable is dependent on individual circumstances. Before making
                                any
                                financial or investment decisions based on the information in this platform, we
                                recommend you should always seek or consult financial, tax and legal advice
                                independently or make such independent investigations as you consider necessary
                                or
                                appropriate regarding to the suitability of the investment product, taking into
                                account
                                your personal investment objectives, financial situation or individual needs. In
                                the
                                event that you may wish to access any services through our platform and by
                                agreeing to
                                enter this website, you expressly accept that SpeedFinance will not and cannot be
                                held
                                liable (in all forms of legal liability) for any transactions or investment
                                decisions
                                made in the platform.
                            </span>
                        </span>
                    </span>
                </p>

                <p>
                    <img width="20" height="20" src="{{ asset('images/contact_us.jpg') }}" />
                    <span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">
                            <span style="font-size:7.0pt">
                            </span>
                            <strong>
                                <span style="font-size:7.0pt">&nbsp;Contact us:
                                    support@SpeedFinance.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </span>
                            </strong>
                        </span>
                    </span>
                    <img width="20" height="20" src="{{ asset('images/web.jpg') }}" />
                    <span style="font-size:11pt">
                        <span style="font-family:Calibri,sans-serif">
                            <span style="font-size:7.0pt">
                            </span>
                            <strong>
                                <span style="font-size:7.0pt">www.SpeedFinance.com</span>
                            </strong>
                        </span>
                    </span>
                </p>
            </td>
        </tr>
    </tbody>
</table>

{{-- <p>&nbsp;</p> --}}
