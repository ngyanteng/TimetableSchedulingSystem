# TimetableSchedulingSystem
Web-based application that allows users to schedule timetables for virtual classes and manage data such as subjects, classes, lecturers and trimesters.

The project's scope is limited to classes from Faculty of Computing and Informatics, Multimedia University. The application has been tested on a local server created with XAMPP.
Test data used includes workloads of Trimester 2 2019/2020 and Trimester 2 2020/2021, with around 180-190 classes per trimester.

All timetables were scheduled successfully while following constraints:
1. A lecturer cannot teach more than one class at a time.
2. Students cannot appear in more than one class at a time.
3. Subjects from the same specialization with one lecture and one tutorial class
cannot clash.
4. Allow user (faculty manager) to black out a slot for reserving faculty event
and meeting.
5. No class before 9a.m.
6. No class at 1-2p.m. for lunch break.
7. No class after 6p.m.
8. Avoid lecturers from teaching four consecutive hours of classes.
9. Lecture classes come before tutorial/lab classes.
