VERSION 5.00
Begin VB.Form Form1 
   BorderStyle     =   1  '單線固定
   Caption         =   "迷霧實戰計時器"
   ClientHeight    =   5010
   ClientLeft      =   45
   ClientTop       =   435
   ClientWidth     =   6855
   LinkTopic       =   "Form1"
   MaxButton       =   0   'False
   MinButton       =   0   'False
   ScaleHeight     =   5010
   ScaleWidth      =   6855
   Begin VB.Frame Frame2 
      Caption         =   "滾動時間計算"
      BeginProperty Font 
         Name            =   "微軟正黑體"
         Size            =   21.75
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   4935
      Left            =   120
      TabIndex        =   10
      Top             =   0
      Width           =   3735
      Begin VB.Timer Timer1 
         Enabled         =   0   'False
         Interval        =   50
         Left            =   3000
         Top             =   1920
      End
      Begin VB.TextBox Text1 
         Alignment       =   2  '置中對齊
         BeginProperty Font 
            Name            =   "Calibri"
            Size            =   27.75
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   795
         Left            =   120
         Locked          =   -1  'True
         TabIndex        =   15
         TabStop         =   0   'False
         Text            =   "000.00"
         Top             =   600
         Width           =   2055
      End
      Begin VB.CheckBox Check1 
         Caption         =   "球騰空越過間隔"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   136
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Index           =   2
         Left            =   240
         TabIndex        =   13
         Top             =   2400
         Width           =   3135
      End
      Begin VB.CheckBox Check1 
         Caption         =   "到達B區底面"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   136
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Index           =   1
         Left            =   240
         TabIndex        =   12
         Top             =   1920
         Width           =   3135
      End
      Begin VB.CheckBox Check1 
         Caption         =   "到達B區"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   136
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Index           =   0
         Left            =   240
         TabIndex        =   11
         Top             =   1440
         Width           =   1935
      End
      Begin VB.CommandButton Command1 
         Caption         =   "開始"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   2280
         TabIndex        =   0
         Top             =   600
         Width           =   1335
      End
      Begin VB.CommandButton Command2 
         Caption         =   "重置"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   2280
         TabIndex        =   1
         Top             =   1200
         Width           =   1335
      End
      Begin VB.TextBox Text2 
         Alignment       =   2  '置中對齊
         BeginProperty Font 
            Name            =   "Calibri"
            Size            =   27.75
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   735
         Left            =   600
         Locked          =   -1  'True
         TabIndex        =   16
         Text            =   "000.00"
         Top             =   4080
         Width           =   2415
      End
      Begin VB.CommandButton Command3 
         Caption         =   "計算加權後秒數"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   240
         TabIndex        =   2
         Top             =   3480
         Width           =   3255
      End
      Begin VB.CheckBox Check1 
         Caption         =   "同一顆球走完兩區"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   136
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Index           =   3
         Left            =   240
         TabIndex        =   14
         Top             =   2880
         Width           =   3375
      End
   End
   Begin VB.Frame Frame1 
      Caption         =   "修理時間"
      BeginProperty Font 
         Name            =   "微軟正黑體"
         Size            =   21.75
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   4935
      Left            =   3960
      TabIndex        =   8
      Top             =   0
      Width           =   2775
      Begin VB.Timer Timer2 
         Enabled         =   0   'False
         Interval        =   10
         Left            =   2640
         Top             =   1320
      End
      Begin VB.CommandButton Command6 
         Caption         =   "加 10 秒"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   615
         Index           =   2
         Left            =   360
         TabIndex        =   5
         Top             =   3000
         Width           =   2055
      End
      Begin VB.CommandButton Command6 
         Caption         =   "加 5 秒"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   585
         Index           =   1
         Left            =   360
         TabIndex        =   4
         Top             =   2280
         Width           =   2055
      End
      Begin VB.CommandButton Command6 
         Caption         =   "加 3 秒"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   615
         Index           =   0
         Left            =   360
         TabIndex        =   3
         Top             =   1560
         Width           =   2055
      End
      Begin VB.CommandButton Command5 
         Caption         =   "重置"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   360
         TabIndex        =   7
         Top             =   4320
         Width           =   2055
      End
      Begin VB.CommandButton Command4 
         Caption         =   "開始"
         BeginProperty Font 
            Name            =   "微軟正黑體"
            Size            =   18
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   495
         Left            =   360
         TabIndex        =   6
         Top             =   3720
         Width           =   2055
      End
      Begin VB.TextBox Text3 
         Alignment       =   2  '置中對齊
         BeginProperty Font 
            Name            =   "Calibri"
            Size            =   27.75
            Charset         =   0
            Weight          =   700
            Underline       =   0   'False
            Italic          =   0   'False
            Strikethrough   =   0   'False
         EndProperty
         Height          =   795
         Left            =   240
         Locked          =   -1  'True
         TabIndex        =   9
         TabStop         =   0   'False
         Text            =   "1:00.00"
         Top             =   600
         Width           =   2295
      End
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Private Declare Function GetTickCount Lib "kernel32" () As Long
Public TimeStart1 As Long, TimeStart2 As Long
Public msec1 As Long, msec2 As Long, totalmsec2 As Long


Private Sub Check1_Click(Index As Integer)

If Index = 1 And Check1(1).Value = 1 Then Check1(0).Value = 1
If Index = 2 And Check1(2).Value = 1 Then Check1(0).Value = 1
If Index = 3 And Check1(3).Value = 1 Then Check1(0).Value = 1

If Index = 0 And Check1(0).Value = 0 Then
    Check1(1).Value = 0
    Check1(2).Value = 0
    Check1(3).Value = 0
End If

End Sub

Private Sub Command1_Click()

Timer1.Enabled = Not Timer1.Enabled
If Timer1.Enabled Then
    Command1.Caption = "停表"
    TimeStart1 = GetTickCount - msec1    ' 保存開始計時基準點
Else
    Command1.Caption = "開始"
End If

End Sub

Private Sub Command2_Click()

Timer1.Enabled = False
Command1.Caption = "開始"
Text1.Text = "000.00"
msec1 = 0

End Sub

Private Sub Command3_Click()

Dim new_msec1 As Long

new_msec1 = msec1

If Check1(0).Value = 0 Then new_msec1 = new_msec1 * 0.5
If Check1(1).Value = 0 Then new_msec1 = new_msec1 * 0.8
If Check1(2).Value = 1 Then new_msec1 = new_msec1 * 1.5
If Check1(3).Value = 1 Then new_msec1 = new_msec1 * 1.5

Text2.Text = Format(new_msec1 \ 1000, "000.") & Format((new_msec1 \ 10) Mod 100, "00")
Clipboard.Clear
Clipboard.SetText Text2.Text

End Sub

Private Sub Command4_Click()

Timer2.Enabled = Not Timer2.Enabled
If Timer2.Enabled Then
    Command4.Caption = "停表"
    TimeStart2 = GetTickCount - msec2   ' 保存開始計時基準點
Else
    Command4.Caption = "開始"
End If

End Sub

Private Sub Command5_Click()

Timer2.Enabled = False
Command4.Caption = "開始"
msec2 = 0
Text3.Text = "1:00.00"
totalmsec2 = 60000
Text3.BackColor = &H80000005

End Sub

Private Sub Command6_Click(Index As Integer)

If (totalmsec2 - msec2 >= 0) Then

    Select Case Index
    
    Case 0:
        totalmsec2 = totalmsec2 + 3000
        
    Case 1:
        totalmsec2 = totalmsec2 + 5000
    
    Case 2:
        totalmsec2 = totalmsec2 + 10000
    
    End Select
    
Dim dtime As Long
dtime = totalmsec2 - msec2

Text3.Text = Format(dtime \ 60000, "0:") & Format((dtime \ 1000) Mod 60, "00.") & Format((dtime \ 10) Mod 100, "00")
    
End If

End Sub


Private Sub Form_Load()

totalmsec2 = 60000
Left = (Screen.Width - Width)

End Sub

Private Sub Timer1_Timer()

msec1 = GetTickCount - TimeStart1    ' 目前系統計數減去開始計數
Text1.Text = Format(msec1 \ 1000, "000.") & Format((msec1 \ 10) Mod 100, "00")

End Sub

Private Sub Timer2_Timer()

msec2 = GetTickCount - TimeStart2    ' 目前系統計數減去開始計數


Dim msign As String
If totalmsec2 - msec2 < 0 Then Text3.BackColor = &HFF&: msign = "-"

Dim dtime As Long
dtime = Abs(totalmsec2 - msec2)

Text3.Text = msign & Format(dtime \ 60000, "0:") & Format((dtime \ 1000) Mod 60, "00.") & Format((dtime \ 10) Mod 100, "00")

End Sub

