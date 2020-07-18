api documentation

1). register APi
{
   url= site.name/api/register;
   method=post;
   parameter[
    name,
    login,
    password (min:6),
    email,
    phone
   ]
   
   example:http://localhost/myTest/public/api/register?name=jamshed&login=abdu&password=123456&email=jamshed@mail.ru&phone=928933320   
}

2). login APi
{
   url= site.name/api/login;
   method=post;
   parameter[
    login,
    password (min:6),
    ]
   
   example: http://localhost/myTest/public/api/login?login=abdu&password=123456   
}

3). addGroup APi
{
   url= site.name/api/addGroup;
   method=post;
   parameter[
    name,
    user_id,
    token
    ]
   
   example: http://localhost/myTest/public/api/addGroup?name=Дом&user_id=1&token=Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjdiOGNjYjQ0ODc3ZWExNWFkOThiMDc0NDU4OGQwMzI0Zjg1MWUyYjQxMGNjNTI5ZTRlNGNiNDI4NzljOGYyMjM3ZjY2YWJhY2FhNDQ4ZDMiLCJpYXQiOjE1OTUwOTk2NjcsIm5iZiI6MTU5NTA5OTY2NywiZXhwIjoxNjI2NjM1NjY3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.VwUz0-CT49Lc0BVW2l6NTapR4bpOb0skPlTMsnABqKXSamra_nrC0YfQPF245R_KcXmAM8kv0zk2Gck132MenrnLSbbB5LnpTaZoRTCRgm4zLq-8AwDBt3r648QtBjOPLjOnp2hhQmMEOFZQNlvWzBg39QY9lit2KgtLgC-MKuGZdrMQe3I7mX5dI64py9fG2W3HO9A68tIVTRNJ2y3MwGXKg1jmWBJ1dE7Qjd6x7_z24wm2HYnfCoRfo_43XiOFplSd49aKDt0UI0pnltLtXCE712iaOjmr1ioB82SZGfzDbolW34lJorpPbKMsSJtx7WVRwOyHHiDCu5OWlg-Zr2qgyPmLXRyucZ4xE401lcpL0v8uXqqZ2Hf6rBdwa0l1VHklr6mNXL_2nxDJHUWRGuA7N24y7o2tPpWy6-2wNZZBkwjjEF__7EwOvB-p3sjb7VDqjfcqi29UQxBRYMae-1GmyZqfJ6YK-7piqKdpaGvfdzbMrFHUNJvIey_GcXM7vb0fGAptim50CmeYEFIf4nCf7MfkNzY21RT1xCbLipfxL4bFbxNANrn1TSd1q6AfBx5u1wDi-bhAwYiYb-UkOvvxH-ukGroZCwCFlZNI4gtkmfJxnHjMOyv6cahwYDHeH3-U_x9o5jEc1EFA7c9vBFe79UNz-O3Zz6qMsHYcicw
}

3). addContact APi
{
   url= site.name/api/addContact;
   method=post;
   parameter[
    name,
    phone,
    address,
    group_id,
    token
    ]
   
   example: http://localhost/myTest/public/api/addNewContact?name=test&phone=928933320&address=khujand&token=Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjdiOGNjYjQ0ODc3ZWExNWFkOThiMDc0NDU4OGQwMzI0Zjg1MWUyYjQxMGNjNTI5ZTRlNGNiNDI4NzljOGYyMjM3ZjY2YWJhY2FhNDQ4ZDMiLCJpYXQiOjE1OTUwOTk2NjcsIm5iZiI6MTU5NTA5OTY2NywiZXhwIjoxNjI2NjM1NjY3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.VwUz0-CT49Lc0BVW2l6NTapR4bpOb0skPlTMsnABqKXSamra_nrC0YfQPF245R_KcXmAM8kv0zk2Gck132MenrnLSbbB5LnpTaZoRTCRgm4zLq-8AwDBt3r648QtBjOPLjOnp2hhQmMEOFZQNlvWzBg39QY9lit2KgtLgC-MKuGZdrMQe3I7mX5dI64py9fG2W3HO9A68tIVTRNJ2y3MwGXKg1jmWBJ1dE7Qjd6x7_z24wm2HYnfCoRfo_43XiOFplSd49aKDt0UI0pnltLtXCE712iaOjmr1ioB82SZGfzDbolW34lJorpPbKMsSJtx7WVRwOyHHiDCu5OWlg-Zr2qgyPmLXRyucZ4xE401lcpL0v8uXqqZ2Hf6rBdwa0l1VHklr6mNXL_2nxDJHUWRGuA7N24y7o2tPpWy6-2wNZZBkwjjEF__7EwOvB-p3sjb7VDqjfcqi29UQxBRYMae-1GmyZqfJ6YK-7piqKdpaGvfdzbMrFHUNJvIey_GcXM7vb0fGAptim50CmeYEFIf4nCf7MfkNzY21RT1xCbLipfxL4bFbxNANrn1TSd1q6AfBx5u1wDi-bhAwYiYb-UkOvvxH-ukGroZCwCFlZNI4gtkmfJxnHjMOyv6cahwYDHeH3-U_x9o5jEc1EFA7c9vBFe79UNz-O3Zz6qMsHYcicw
}
