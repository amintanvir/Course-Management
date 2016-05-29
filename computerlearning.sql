-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2016 at 05:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `computerlearning`
--

DELIMITER $$
--
-- Procedures
--
CREATE  PROCEDURE `sp_assignteachertoclass_ins_upd`(
    IN in_Id INT(11),
    IN in_TeacherId INT,
    IN in_CourseDetailsId INT,
    IN in_AssignDate DATE,
    IN in_OtherInfo VARCHAR(400),
    IN in_CreatedBy INT,
    IN in_ModifiedBy INT
)
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM   assignteachertoclass)+1);
  IF in_Id = 0 THEN
  	INSERT INTO  assignteachertoclass(Id, 	TeacherId,  CourseDetailsId, AssignDate, OtherInfo, CreatedBy, ModifiedBy, 

Status) 
VALUES(MaxId, in_TeacherId, in_CourseDetailsId, in_AssignDate, in_OtherInfo, in_CreatedBy, in_ModifiedBy, 0);
  ELSE
  	UPDATE  assignteachertoclass
    	SET
    TeacherId = in_TeacherId,
    CourseDetailsId =  in_CourseDetailsId,
    AssignDate =  in_AssignDate,
    OtherInfo = in_OtherInfo,
    CreatedBy = in_CreatedBy,
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
  END$$

CREATE  PROCEDURE `sp_assignteachertoclass_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
	IF in_Id=0 THEN 
    SELECT at.Id, at.TeacherId, at.CourseDetailsId, at.AssignDate, at.OtherInfo, at.CreationDate, at.CreatedBy, 

at.ModifyDate, at.ModifiedBy, at.Status, c.CourseName, t.FullName FROM assignteachertoclass at, coursedetails c, 

courseteacher t WHERE at.CourseDetailsId = c.Id AND at.TeacherId=t.Id ORDER BY at.Id DESC;
	ELSE
    SELECT at.Id, at.TeacherId, at.CourseDetailsId, at.AssignDate, at.OtherInfo, at.CreationDate, at.CreatedBy, 

at.ModifyDate, at.ModifiedBy, at.Status, c.CourseName, t.FullName FROM assignteachertoclass at, coursedetails c, 

courseteacher t WHERE at.CourseDetailsId = c.Id AND at.TeacherId=t.Id AND at.Id=in_Id ORDER BY at.Id DESC;
    END IF;
END$$

CREATE  PROCEDURE `sp_coursecategory_checkexist`(
    IN in_CategoryName VARCHAR(80)
)
BEGIN
  	SELECT Id FROM coursecategory WHERE Status<>9 AND CategoryName=in_CategoryName ORDER BY Id DESC;
END$$

CREATE DEFINER=`almamate_testdb`@`localhost` PROCEDURE `sp_coursecategory_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
  	UPDATE 
		coursecategory
	SET
		ModifyDate = now(),
		Status = 9,
		ModifiedBy = in_ModifiedBy
	WHERE 
		Id = in_Id;  
END$$

CREATE DEFINER=`almamate_testdb`@`localhost` PROCEDURE `sp_coursecategory_ins_upd`(
    IN in_Id INT(11),
    IN in_CategoryName VARCHAR(80),
    IN in_CreatedBy INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM coursecategory)+1);
  IF in_Id = 0 THEN
  	INSERT INTO coursecategory(Id, CategoryName, CreatedBy, ModifiedBy) VALUES(MaxId, in_CategoryName, in_CreatedBy, 

in_ModifiedBy);
  ELSE
  	UPDATE coursecategory 
    	SET
    CategoryName = in_CategoryName,
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE DEFINER=`almamate_testdb`@`localhost` PROCEDURE `sp_coursecategory_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
  IF in_Id = 0 THEN
  	SELECT * FROM coursecategory WHERE Status<>9 ORDER BY Id DESC;
  ELSE
  	SELECT * FROM coursecategory WHERE Id = in_Id  ORDER BY Id DESC;
    
  END IF;
END$$

CREATE  PROCEDURE `sp_coursedetails_checkexist`(
    IN in_CourseName VARCHAR(80),
    IN in_CourseCategoryId INT,
    IN in_BatchNo VARCHAR(40)
)
BEGIN
  	SELECT Id FROM coursedetails WHERE Status<>9 AND CourseName=in_CourseName AND 

CourseCategoryId=in_CourseCategoryId AND BatchNo=in_BatchNo ORDER BY Id DESC;
END$$

CREATE  PROCEDURE `sp_coursedetails_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
UPDATE coursedetails 
    	SET
    ModifyDate = now(),
    ModifiedBy = in_ModifiedBy,
    Status = 9
	WHERE 
    Id = in_Id;
	
END$$

CREATE  PROCEDURE `sp_coursedetails_ins_upd`(
    IN in_Id INT(11),
    IN in_CourseCategoryId INT(11),
    IN in_CourseName VARCHAR(80),
    IN in_CourseDetails  VARCHAR(72),
    IN in_CoursePrice float(10,2), 
    IN in_CourseDuration  VARCHAR(42),
    IN in_StartDate Date,
    IN in_CourseTime VARCHAR(34),
    IN in_CourseSchedule VARCHAR(400),
    IN in_CreatedBy INT(11),
    IN in_ModifiedBy INT(11),
    IN in_BatchNo VARCHAR(40)
)
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM  coursedetails)+1);
  IF  in_Id = 0 THEN
  	INSERT INTO coursedetails(Id, CourseCategoryId, CourseName, CourseDetails, CoursePrice, CourseDuration, StartDate, 

CourseTime, CourseSchedule, CreatedBy, ModifiedBy, Status, BatchNo) VALUES(MaxId, in_CourseCategoryId, in_CourseName, 

in_CourseDetails, in_CoursePrice, in_CourseDuration, in_StartDate,  in_CourseTime, in_CourseSchedule, in_CreatedBy, 

in_ModifiedBy, 0, in_BatchNo);
  ELSE
  	UPDATE coursedetails 
    	SET
    CourseName = in_CourseName,
    CourseCategoryId = in_CourseCategoryId,
    CourseDetails = in_CourseDetails,
    CoursePrice =  in_CoursePrice,
    CourseDuration = in_CourseDuration,
    StartDate = in_StartDate,
    CourseTime = in_CourseTime,
    CourseSchedule = in_CourseSchedule,
    
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1,
    BatchNo = in_BatchNo
    	WHERE 
    Id = in_Id;
    
  END IF;


  END$$

CREATE  PROCEDURE `sp_coursedetails_selbycoursecategoryid`(
    IN in_CourseCategoryId INT(11)
)
BEGIN
  	SELECT cd.Id, cd.CourseCategoryId, cd.CourseName, cd.CourseDetails, cd.CoursePrice, cd.CourseDuration, 

cd.StartDate, cd.CourseTime, cd.CourseSchedule, (SELECT FullName FROM user WHERE Id = cd.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = cd.ModifiedBy) AS ModifiedByUserName, c.CategoryName, cd.CreatedBy, cd.CreationDate,
cd.ModifiedBy, cd.ModifyDate, cd.BatchNo FROM coursedetails cd, coursecategory c WHERE cd.CourseCategoryId = c.Id AND 

cd.Status <> 9  AND cd.CourseCategoryId=in_CourseCategoryId ORDER BY cd.Id DESC;
  
 END$$

CREATE  PROCEDURE `sp_coursedetails_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
  IF in_Id = 0 THEN
  	SELECT cd.Id, cd.CourseCategoryId, cd.CourseName, cd.CourseDetails, cd.CoursePrice, cd.CourseDuration, 

cd.StartDate, cd.CourseTime, cd.CourseSchedule, (SELECT FullName FROM user WHERE Id = cd.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = cd.ModifiedBy) AS ModifiedByUserName, c.CategoryName, cd.CreatedBy, cd.CreationDate,
cd.ModifiedBy, cd.ModifyDate, cd.BatchNo FROM coursedetails cd, coursecategory c WHERE cd.CourseCategoryId = c.Id AND cd.Status <> 9  

ORDER BY cd.Id DESC;
  ELSE 
  	SELECT cd.Id, cd.CourseCategoryId, cd.CourseName, cd.CourseDetails, cd.CoursePrice, cd.CourseDuration, 

cd.StartDate, cd.CourseTime, cd.CourseSchedule, (SELECT FullName FROM user WHERE Id = cd.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = cd.ModifiedBy) AS ModifiedByUserName, c.CategoryName, cd.CreatedBy, cd.CreationDate,
cd.ModifiedBy, cd.ModifyDate, cd.BatchNo FROM coursedetails cd, coursecategory c WHERE cd.CourseCategoryId = c.Id AND cd.Id 

= in_Id ORDER BY cd.Id DESC;
     
  END IF;

 END$$

CREATE  PROCEDURE `sp_courseregistration_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT
)
BEGIN
    UPDATE courseregistration 
    	SET
    
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 9
    	WHERE 
    Id = in_Id;

  END$$

CREATE  PROCEDURE `sp_courseregistration_ins_upd`(
    IN in_Id INT(11),
    IN in_StudentId INT(11),
    IN in_CourseId INT(11),
    IN in_RegistrationDate DATE,
    IN in_PaidAmount FLOAT(10,2),
    IN in_PaybleAmount FLOAT(10,2),
    IN in_PaymentDate DATE,
    IN in_DuePaymentDate DATE,
    IN in_Discount INT,
    IN in_CreatedBy INT,
    IN in_ModifiedBy INT
)
BEGIN
  DECLARE MaxId INT;
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM  courseregistration)+1);
  IF  in_Id = 0 THEN
  	INSERT INTO courseregistration(Id, StudentId, CourseId, RegistrationDate, PaidAmount, PaybleAmount, PaymentDate, DuePaymentDate, Discount, CreatedBy, ModifiedBy, Status) VALUES(MaxId, in_StudentId, in_CourseId, in_RegistrationDate, in_PaidAmount, in_PaybleAmount, in_PaymentDate,  in_DuePaymentDate, in_Discount, in_CreatedBy, in_ModifiedBy, 0);
  ELSE
  	UPDATE courseregistration 
    	SET
    StudentId = in_StudentId,
    CourseId = in_CourseId,
    RegistrationDate = in_RegistrationDate,
    PaidAmount =  in_PaidAmount,
    PaybleAmount = in_PaybleAmount,
    PaymentDate = in_PaymentDate,
    DuePaymentDate = in_DuePaymentDate,
    Discount = in_Discount,
    
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;


  END$$

CREATE  PROCEDURE `sp_courseregistration_sel_due_date`(IN `in_DuePaymentDate` DATE)
BEGIN
IF in_DuePaymentDate=0 THEN
    SELECT cr.Id,  cr.RegistrationDate, cr.PaybleAmount, cr.PaymentDate, 
cr.DuePaymentDate,  cd.CourseName,  s.FullName, s.Picture 
 FROM courseregistration cr, coursedetails cd, student s 
 WHERE cr.CourseId = cd.Id AND cr.StudentId = s.Id AND cr.Status <> 9  AND cr.PaybleAmount>0 ORDER BY cr.Id DESC;
ELSE
SELECT cr.Id,  cr.RegistrationDate, cr.PaybleAmount, cr.PaymentDate, 
cr.DuePaymentDate,  cd.CourseName,  s.FullName, s.Picture 
 FROM courseregistration cr, coursedetails cd, student s 
 WHERE cr.CourseId = cd.Id AND cr.StudentId = s.Id AND cr.Status <> 9 AND 
cr.DuePaymentDate=in_DuePaymentDate AND cr.PaybleAmount>0 ORDER BY cr.Id DESC;
END IF;
  END$$

CREATE  PROCEDURE `sp_courseregistration_sel_selbyid`(
    IN in_Id INT
    )
BEGIN
    IF in_Id=0 THEN
    SELECT cr.Id, cr.StudentId, cr.CourseId, cr.RegistrationDate, cr.PaidAmount, cr.PaybleAmount, cr.PaymentDate, 

cr.DuePaymentDate, cr.Discount, cr.CreatedBy, cr.CreationDate, cr.ModifiedBy, cr.ModifyDate, cr.Status, (SELECT UserName 

FROM user WHERE Id = cr.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id = cr.ModifiedBy) AS 

ModifiedByUserName, cd.CourseName, cd.CoursePrice, s.FullName, s.Contact, s.Email FROM courseregistration cr, coursedetails 

cd, student s WHERE cr.CourseId = cd.Id AND cr.StudentId = s.Id AND cr.Status <> 9 ORDER BY cr.Id DESC;
    ELSE 
    SELECT cr.Id, cr.StudentId, cr.CourseId, cr.RegistrationDate, cr.PaidAmount, cr.PaybleAmount, cr.PaymentDate, 

cr.DuePaymentDate, cr.Discount, cr.CreatedBy, cr.CreationDate, cr.ModifiedBy, cr.ModifyDate, cr.Status, (SELECT UserName 

FROM user WHERE Id = cr.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id = cr.ModifiedBy) AS 

ModifiedByUserName, cd.CourseName, cd.CoursePrice, s.FullName, s.Contact, s.Email FROM courseregistration cr, coursedetails 

cd, student s WHERE cr.CourseId = cd.Id AND cr.StudentId = s.Id AND cr.Id = in_Id ORDER BY cr.Id DESC;
    END IF;
 END$$

CREATE  PROCEDURE `sp_courseteacher_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
UPDATE courseteacher 
    	SET
    ModifyDate = now(),
    ModifiedBy = in_ModifiedBy,
    Status = 9
	WHERE 
    Id = in_Id;
	
END$$

CREATE  PROCEDURE `sp_courseteacher_exist`(
    IN in_Email VARCHAR(80)
)
BEGIN
  SELECT Id FROM courseteacher WHERE Status<>9 AND Email=in_Email;
END$$

CREATE  PROCEDURE `sp_courseteacher_ins_upd`(IN `in_Id` INT(11), IN `in_FullName` VARCHAR(80), IN `in_Address` VARCHAR(200), IN `in_ContactNumber` VARCHAR(14), IN `in_Email` VARCHAR(80), IN `in_InterestedArea` VARCHAR(400), IN `in_Designation` VARCHAR(60), IN `in_AcademicDescription` VARCHAR(400), IN `in_Message` VARCHAR(1000), IN `in_JoinDate` DATE, IN `in_EmployementStatus` INT(11), IN `in_CreatedBy` INT(11), IN `in_ModifiedBy` INT(11), IN `in_Picture` VARCHAR(60), IN `in_UserType` INT(11), IN `in_Salary` FLOAT(10,2), IN `in_Gender` VARCHAR(10))
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM   courseteacher)+1);
  IF in_Id = 0 THEN
  	INSERT INTO  courseteacher(Id, 	FullName,  Address, ContactNumber, Email, InterestedArea, Designation, 	

AcademicDescription, Message, JoinDate, EmployementStatus, CreatedBy, ModifiedBy, Picture, Status, UserType, Salary, Gender) 
VALUES(MaxId, in_FullName, in_Address, in_ContactNumber, in_Email, in_InterestedArea, in_Designation, 

in_AcademicDescription, in_Message, in_JoinDate, in_EmployementStatus,  in_CreatedBy, in_ModifiedBy, in_Picture, 0,
 in_UserType, in_Salary, in_Gender);
  ELSE
  	UPDATE  courseteacher 
    	SET
    FullName = in_FullName,
    Address =  in_Address,
    ContactNumber =  in_ContactNumber,
    Email = in_Email,
    InterestedArea = in_InterestedArea,
    Designation = in_Designation,
    AcademicDescription = in_AcademicDescription,
    Message = in_Message,
    JoinDate = in_JoinDate,
    EmployementStatus = in_EmployementStatus,
    ModifiedBy = in_ModifiedBy,
    Picture  =  in_Picture,
    ModifyDate = now(),
    Status = 1,
    UserType = in_UserType,
    Salary = in_Salary,
    Gender = in_Gender
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE  PROCEDURE `sp_courseteacher_selbylimit`(IN `in_Limit` INT, IN `in_UserType` INT)
BEGIN
	IF in_UserType>0 THEN
        SELECT ct.Id, ct.FullName, ct.Address, ct.ContactNumber, ct.Email, ct.InterestedArea, ct.Designation, 

ct.AcademicDescription, ct.Message, ct.JoinDate, ct.EmployementStatus, ct.CreationDate, ct.CreatedBy, ct.ModifyDate, ct.Gender,

ct.Picture, ct.Status, ct.UserType, ct.Salary, (SELECT FullName FROM user WHERE Id = ct.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = ct.ModifiedBy) AS ModifiedBy  FROM courseteacher ct where   ct.Status <> 9  AND 

ct.UserType=in_UserType ORDER BY ct.Id DESC LIMIT in_Limit;
	
	ELSE
        SELECT ct.Id, ct.FullName, ct.Address, ct.ContactNumber, ct.Email, ct.InterestedArea, ct.Designation, ct.Gender,

ct.AcademicDescription, ct.Message, ct.JoinDate, ct.EmployementStatus, ct.CreationDate, ct.CreatedBy, ct.ModifyDate, 

ct.Picture, ct.Status, ct.UserType, ct.Salary, (SELECT FullName FROM user WHERE Id = ct.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = ct.ModifiedBy) AS ModifiedBy  FROM courseteacher ct where   ct.Status <> 9 ORDER BY 

ct.Id DESC LIMIT in_Limit;
	END IF;

END$$

CREATE  PROCEDURE `sp_courseteacher_sel_selbyid`(IN `in_Id` INT, IN `in_UserType` INT)
BEGIN
    
    if (in_Id > 0) then
        SELECT ct.Id, ct.FullName, ct.Address, ct.ContactNumber, ct.Email, ct.InterestedArea, ct.Designation, ct.Gender,

ct.AcademicDescription, ct.Message, ct.JoinDate, ct.EmployementStatus, ct.CreationDate, ct.CreatedBy, ct.ModifyDate, 

ct.Picture, ct.Status, ct.UserType, ct.Salary, (SELECT FullName FROM user WHERE Id = ct.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = ct.ModifiedBy) AS ModifiedBy  FROM courseteacher ct where   ct.Status <> 9 AND 
ct.Id = in_Id ORDER BY ct.Id DESC;


    elseif (in_UserType > 0) then
        SELECT ct.Id, ct.FullName, ct.Address, ct.ContactNumber, ct.Email, ct.InterestedArea, ct.Designation, ct.Gender,

ct.AcademicDescription, ct.Message, ct.JoinDate, ct.EmployementStatus, ct.CreationDate, ct.CreatedBy, ct.ModifyDate, 

ct.Picture, ct.Status, ct.UserType, ct.Salary, (SELECT FullName FROM user WHERE Id = ct.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = ct.ModifiedBy) AS ModifiedBy  FROM courseteacher ct where ct.Status <> 9 AND 

ct.UserType = in_UserType  ORDER BY ct.Id DESC;

    else 
SELECT ct.Id, ct.FullName, ct.Address, ct.ContactNumber, ct.Email, ct.InterestedArea, ct.Designation, ct.Gender,

ct.AcademicDescription, ct.Message, ct.JoinDate, ct.EmployementStatus, ct.CreationDate, ct.CreatedBy, ct.ModifyDate, 

ct.Picture, ct.Status, ct.UserType, ct.Salary, (SELECT FullName FROM user WHERE Id = ct.CreatedBy) AS CreatedByUserName,  

(SELECT FullName FROM user WHERE Id = ct.ModifiedBy) AS ModifiedBy  FROM courseteacher ct ORDER BY ct.Id DESC;
    end if;

END$$

CREATE  PROCEDURE `sp_employeesalary_ins_upd`(
		IN in_Id INT,
		IN in_CurrentSalary FLOAT(10,2),
		IN in_PaidSalary FLOAT(10,2),		
		IN in_EmployeeId INT, 
		IN in_SalaryDate DATE,
		IN in_CreatedBy INT,
		IN in_ModifiedBy INT
	)
BEGIN
		DECLARE MaxId INT;
		SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM  employeesalary)+1);

		IF in_Id = 0 THEN
			INSERT INTO employeesalary(Id, CurrentSalary, PaidSalary, EmployeeId, SalaryDate, CreatedBy, 

ModifiedBy)
			VALUES 
		(MaxId, in_CurrentSalary, in_PaidSalary, in_EmployeeId, in_SalaryDate, in_CreatedBy, in_ModifiedBy);
		
		ELSE
			UPDATE employeesalary
				SET
			CurrentSalary = in_CurrentSalary,
			PaidSalary = in_PaidSalary,

			EmployeeId = in_EmployeeId, 
			SalaryDate = in_SalaryDate,
			CreatedBy = in_CreatedBy,
			ModifiedBy = in_ModifiedBy
				WHERE
			Id = in_Id;
		END IF;

	END$$

CREATE  PROCEDURE `sp_employeesalary_sel_selbyid_limit`(in in_Id INT, in in_Limit INT)
BEGIN
    
    if (in_Id > 0) then
        SELECT es.Id, es.CurrentSalary, es.PaidSalary, es.EmployeeId, es.SalaryDate, es.CreatedBy, es.ModifiedBy, es.ModifyDate, c.FullName, c.ContactNumber, c.UserType, (SELECT UserName FROM user WHERE Id=es.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id=es.ModifiedBy) AS ModifiedByUserName FROM employeesalary es, courseteacher c WHERE es.EmployeeId = c.Id AND es.Id=in_Id ORDER BY es.Id DESC;
    elseif (in_Limit > 0) then
        SELECT es.Id, es.CurrentSalary, es.PaidSalary, es.EmployeeId, es.SalaryDate, es.CreatedBy, es.ModifiedBy, es.ModifyDate, c.FullName, c.ContactNumber, c.UserType, (SELECT UserName FROM user WHERE Id=es.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id=es.ModifiedBy) AS ModifiedByUserName FROM employeesalary es, courseteacher c WHERE es.EmployeeId = c.Id ORDER BY es.Id DESC LIMIT in_Limit;
    else 
        SELECT es.Id, es.CurrentSalary, es.PaidSalary, es.EmployeeId, es.SalaryDate, es.CreatedBy, es.ModifiedBy, es.ModifyDate, c.FullName, c.ContactNumber, c.UserType, (SELECT UserName FROM user WHERE Id=es.CreatedBy) AS CreatedByUserName, (SELECT UserName FROM user WHERE Id=es.ModifiedBy) AS ModifiedByUserName FROM employeesalary es, courseteacher c WHERE es.EmployeeId = c.Id ORDER BY es.Id DESC;
    end if;

END$$

CREATE  PROCEDURE `sp_expencecategory_ins_upd`(
    IN in_Id INT(11),
    IN in_ExpenseCategoryName VARCHAR(80),
    IN in_CreatedBy INT(11),
    IN in_ModifiedBy INT(11)
    
)
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM expensecategory)+1);
  IF in_Id = 0 THEN
  	INSERT INTO expensecategory(Id, ExpenseCategoryName, CreatedBy, ModifiedBy) VALUES(MaxId, in_ExpenseCategoryName, 

in_CreatedBy, 

in_ModifiedBy);
  ELSE
  	UPDATE expensecategory 
    	SET
    ExpenseCategoryName = in_ExpenseCategoryName,
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE  PROCEDURE `sp_expensecategory_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
UPDATE expensecategory 
    	SET
    ModifyDate = now(),
    ModifiedBy = in_ModifiedBy,
    Status = 9
	WHERE 
    Id = in_Id;
	
END$$

CREATE  PROCEDURE `sp_expensecategory_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
  IF in_Id = 0 THEN
   SELECT * FROM expensecategory WHERE Status<>9 ORDER BY Id DESC;
  ELSE
   SELECT * FROM expensecategory WHERE Id = in_Id  ORDER BY Id DESC;
    
  END IF;
END$$

CREATE  PROCEDURE `sp_expensedetails_del`(

    IN in_Id INT(11),
    IN in_ModifiedBy INT 
)
BEGIN
  
  	UPDATE  expensedetails 
    	SET
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 9
    	WHERE 
    Id = in_Id;
    
  
END$$

CREATE  PROCEDURE `sp_expensedetails_ins_upd`(IN `in_Id` INT(11), IN `in_ExpenseTitle` VARCHAR(200), IN `in_ExpenseDescription` VARCHAR(200), IN `in_ExpenseMoney` FLOAT(10,2), IN `in_ExpenseCategoryId` INT(11), IN `in_ExpenseDate` DATE, IN `in_CreatedBy` INT(11), IN `in_ModifiedBy` INT(11))
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM  expensedetails)+1);
  IF  in_Id = 0 THEN
  	INSERT INTO expensedetails(Id, ExpenseTitle, ExpenseDescription, ExpenseMoney, ExpenseCategoryId, ExpenseDate,  CreatedBy, ModifiedBy, Status) VALUES(MaxId,  in_ExpenseTitle, in_ExpenseDescription, in_ExpenseMoney, in_ExpenseCategoryId, in_ExpenseDate,  in_CreatedBy, in_ModifiedBy, 0);
  
  ELSE
  	UPDATE expensedetails
    	SET
    ExpenseTitle = in_ExpenseTitle,
    ExpenseDescription = in_ExpenseDescription,
    ExpenseMoney = in_ExpenseMoney,
    ExpenseCategoryId =  in_ExpenseCategoryId,
    ExpenseDate = in_ExpenseDate,
    
    
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE  PROCEDURE `sp_expensedetails_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
  IF in_Id = 0 THEN
  	SELECT ex.Id, ex.ExpenseTitle, ex.ExpenseDescription, ex.ExpenseMoney, ex.ExpenseCategoryId, ex.ExpenseDate, (SELECT FullName FROM user WHERE Id = ex.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = ex.ModifiedBy) AS ModifiedBy, exn.ExpenseCategoryName FROM expensedetails ex, expensecategory exn WHERE ex.ExpenseCategoryId = exn.Id AND ex.Status <> 9 ORDER BY ex.Id DESC;
  ELSE 
  	SELECT ex.Id, ex.ExpenseTitle, ex.ExpenseDescription, ex.ExpenseMoney, ex.ExpenseCategoryId, ex.ExpenseDate, (SELECT FullName FROM user WHERE Id = ex.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = ex.ModifiedBy) AS ModifiedBy, exn.ExpenseCategoryName FROM expensedetails ex, expensecategory exn WHERE ex.ExpenseCategoryId = exn.Id and  ex.Id = in_Id ORDER BY ex.Id DESC;
     
  END IF;

END$$

CREATE  PROCEDURE `sp_incomecategory_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
UPDATE incomecategory 
    	SET
    ModifyDate = now(),
    ModifiedBy = in_ModifiedBy,
    Status = 9
	WHERE 
    Id = in_Id;
	
END$$

CREATE  PROCEDURE `sp_incomecategory_ins_upd`(
    IN in_Id INT(11),
    IN in_IncomeCategoryName VARCHAR(80),
    IN in_CreatedBy INT(11),
    IN in_ModifiedBy INT(11)
    
)
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM incomecategory)+1);
  IF in_Id = 0 THEN
  	INSERT INTO incomecategory(Id, IncomeCategoryName, CreatedBy, ModifiedBy) VALUES(MaxId, in_IncomeCategoryName, 

in_CreatedBy, 

in_ModifiedBy);
  ELSE
  	UPDATE incomecategory 
    	SET
    IncomeCategoryName = in_IncomeCategoryName,
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE  PROCEDURE `sp_incomecategory_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
  IF in_Id = 0 THEN
   SELECT * , (SELECT UserName FROM user WHERE Id=CreatedBy) AS CreateByUserName, (SELECT UserName FROM user WHERE 

Id=ModifiedBy) AS ModifiedByUserName FROM incomecategory WHERE Status<>9 ORDER BY Id DESC;
  ELSE
    SELECT * , (SELECT UserName FROM user WHERE Id=CreatedBy) AS CreateByUserName, (SELECT UserName FROM user WHERE 

Id=ModifiedBy) AS ModifiedByUserName  FROM incomecategory WHERE Id = in_Id  ORDER BY Id DESC;
    
  END IF;
END$$

CREATE  PROCEDURE `sp_incomedetails_del`(
    IN in_Id INT(11),
    IN in_ModifiedBy INT 
)
BEGIN

  
  	UPDATE  incomedetails 
    	SET
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 9
    	WHERE 
    Id = in_Id;
    
  
END$$

CREATE  PROCEDURE `sp_incomedetails_ins_upd`(IN `in_Id` INT(11), IN `in_IncomeTitle` VARCHAR(200), IN `in_IncomeDescription` 

VARCHAR(200), IN `in_IncomeMoney` FLOAT(10,2), IN `in_IncomeCategoryId` INT(11), IN `in_IncomeDate` DATE, IN `in_CreatedBy` 

INT(11), IN `in_ModifiedBy` INT(11))
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM  incomedetails)+1);
  IF  in_Id = 0 THEN
  	INSERT INTO incomedetails(Id, IncomeTitle, IncomeDescription, IncomeMoney, IncomeCategoryId, IncomeDate,  

CreatedBy, ModifiedBy, Status) VALUES(MaxId,  in_IncomeTitle, in_IncomeDescription, in_IncomeMoney, in_IncomeCategoryId, 

in_IncomeDate,  in_CreatedBy, in_ModifiedBy, 0);
  
  ELSE
  	UPDATE incomedetails
    	SET
    IncomeTitle = in_IncomeTitle,
    IncomeDescription = in_IncomeDescription,
    IncomeMoney = in_IncomeMoney,
    IncomeCategoryId =  in_IncomeCategoryId,
    IncomeDate = in_IncomeDate,
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE  PROCEDURE `sp_incomedetails_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN
  IF in_Id = 0 THEN
  	SELECT inc.Id, inc.IncomeTitle, inc.IncomeDescription, inc.IncomeMoney, inc.IncomeCategoryId, inc.IncomeDate, 

(SELECT FullName FROM user WHERE Id = inc.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = inc.ModifiedBy) AS 

ModifiedBy, inct.IncomeCategoryName FROM incomedetails inc,  incomecategory inct WHERE inc.IncomeCategoryId = inct.Id AND 

inc.Status <> 9 ORDER BY inc.Id DESC;
  ELSE 
  	SELECT inc.Id, inc.IncomeTitle, inc.IncomeDescription, inc.IncomeMoney, inc.IncomeCategoryId, inc.IncomeDate, 

(SELECT FullName FROM user WHERE Id = inc.CreatedBy) AS CreatedBy, (SELECT FullName FROM user WHERE Id = inc.ModifiedBy) AS 

ModifiedBy, inct.IncomeCategoryName FROM incomedetails inc,  incomecategory inct WHERE inc.IncomeCategoryId = inct.Id and  

inc.Id = in_Id ORDER BY inc.Id DESC;

     
  END IF;

END$$

CREATE  PROCEDURE `sp_student_del`( 
   IN in_Id INT(11), 
   IN in_ModifiedBy INT(11) 
)
BEGIN 
   UPDATE student 
	SET 
   ModifiedBy = in_ModifiedBy, 
   ModifyDate = now(), 
   Status = 9 
	WHERE 
   Id = in_Id; 
END$$

CREATE  PROCEDURE `sp_student_exist`(
    IN in_Email VARCHAR(80),
    IN in_Contact VARCHAR(14),
    IN in_StudentId VARCHAR(40)
)
BEGIN
	SELECT Id FROM Student WHERE Status<>9 AND (Email=in_Email OR Contact=in_Contact OR StudentId=in_StudentId);
END$$

CREATE  PROCEDURE `sp_student_ins_upd`(
    IN in_Id INT(11),
    IN in_FullName VARCHAR(80),
    IN in_Address VARCHAR(400),
    IN in_AcademicDescription VARCHAR(400),
    IN in_StudentId VARCHAR(400),
    IN in_JoinDate date ,
    IN in_OtherInfo varchar(400),
    IN in_Contact varchar(14),
    IN in_Email varchar(80),
    IN in_Picture varchar(60),
   
    IN in_CreatedBy INT(11),
    IN in_ModifiedBy INT(11)
)
BEGIN
  DECLARE MaxId INT(11);
  SET MaxId = ((SELECT IFNULL(MAX(Id),0) FROM   student)+1);
  IF in_Id = 0 THEN
  	INSERT INTO  student(Id, FullName,  Address, AcademicDescription, StudentId, JoinDate, OtherInfo, Contact, Email, Picture, CreatedBy, ModifiedBy, Status) 
VALUES(MaxId, in_FullName, in_Address, in_AcademicDescription, in_StudentId, in_JoinDate, in_OtherInfo, in_Contact, in_Email, in_Picture, in_CreatedBy, in_ModifiedBy, 0);
  ELSE
  	UPDATE  student 
    	SET
    FullName = in_FullName,
    Address =  in_Address,
    AcademicDescription =  in_AcademicDescription,
    StudentId = in_StudentId,
    JoinDate = in_JoinDate,
    OtherInfo  =  in_OtherInfo,
    Contact  =  in_Contact,
    Email  =  in_Email,
    Picture  =  in_Picture,
    ModifiedBy = in_ModifiedBy,
    ModifyDate = now(),
    Status = 1
    	WHERE 
    Id = in_Id;
    
  END IF;
  
END$$

CREATE  PROCEDURE `sp_student_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN

IF in_Id = 0 THEN

	SELECT s.Id, s.FullName, s.Address, s.AcademicDescription, s.StudentId, s.JoinDate, s.OtherInfo, s.Contact, 

s.Email, s.Picture, (SELECT UserName 	FROM user WHERE Id = s.CreatedBy) AS CreatedByUser, (SELECT UserName FROM user 

WHERE Id = s.CreatedBy) AS 	ModifiedByUser, s.CreatedBy, s.ModifiedBy, s.Status FROM student s WHERE s.Status<>9 ORDER 

BY s.Id DESC;
ELSE
	SELECT s.Id, s.FullName, s.Address, s.AcademicDescription, s.StudentId, s.JoinDate, s.OtherInfo, s.Contact, 

s.Email, s.Picture, (SELECT UserName 	FROM user WHERE Id = s.CreatedBy) AS CreatedByUser, (SELECT UserName FROM user 

WHERE Id = s.CreatedBy) AS 	ModifiedByUser, s.CreatedBy, s.ModifiedBy, s.Status FROM student s WHERE s.Status<>9 AND 

s.Id = in_Id ORDER BY s.Id DESC;
END IF;
END$$

CREATE  PROCEDURE `sp_user_change_password`(
    IN in_Id INT(11),
    IN in_Password VARCHAR(40)
)
BEGIN
	
	UPDATE user
		SET 
	Password = in_Password
		WHERE
	Id = in_Id;
	
END$$

CREATE DEFINER=`almamate_testdb`@`localhost` PROCEDURE `sp_user_login`(
    IN in_UserName VARCHAR(200),
    IN in_Password VARCHAR(40)
)
BEGIN
  SELECT Id, UserName, UserType FROM user WHERE UserName = in_UserName AND Password = in_Password;
END$$

CREATE  PROCEDURE `sp_user_sel_selbyid`(
    IN in_Id INT(11)
)
BEGIN

IF in_Id = 0 THEN
	SELECT * FROM user;
ELSE
	SELECT * FROM user WHERE Id = in_Id;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `assignteachertoclass`
--

CREATE TABLE IF NOT EXISTS `assignteachertoclass` (
  `Id` int(11) NOT NULL,
  `TeacherId` int(11) NOT NULL,
  `CourseDetailsId` int(11) NOT NULL,
  `AssignDate` date DEFAULT NULL,
  `OtherInfo` varchar(600) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignteachertoclass`
--

INSERT INTO `assignteachertoclass` (`Id`, `TeacherId`, `CourseDetailsId`, `AssignDate`, `OtherInfo`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Status`) VALUES
(1, 1, 9, '2015-06-16', '', '2015-06-14 14:56:46', 1, '2015-06-14 14:56:46', 1, 0),
(2, 2, 14, '2015-09-14', 'none', '2015-09-14 15:50:17', 1, '2015-09-14 15:50:17', 1, 0),
(3, 1, 10, '2015-10-14', 'No', '2015-09-14 16:27:20', 1, '2015-09-14 16:27:20', 1, 0),
(4, 2, 11, '2016-01-28', 'None', '2016-01-30 07:10:01', 1, '2016-01-30 07:10:01', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coursecategory`
--

CREATE TABLE IF NOT EXISTS `coursecategory` (
  `Id` int(11) NOT NULL,
  `CategoryName` varchar(80) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursecategory`
--

INSERT INTO `coursecategory` (`Id`, `CategoryName`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Status`) VALUES
(1, 'Programming Technology ', '2015-06-06 16:54:31', 1, '2015-06-06 16:54:31', 1, 0),
(2, 'Vendor', '2015-06-06 16:55:04', 1, '2015-06-06 16:55:04', 1, 0),
(3, 'Microsoft Office', '2015-06-06 16:55:38', 1, '2015-06-06 16:55:38', 1, 0),
(4, 'Microsoft Technical', '2015-06-06 16:55:52', 1, '2015-06-06 16:55:52', 1, 0),
(5, 'CISCO', '2015-06-06 16:56:08', 1, '2015-06-06 16:56:08', 1, 0),
(6, 'Information Security ', '2015-06-06 16:56:38', 1, '2015-06-06 16:56:38', 1, 0),
(7, 'Cloud Computing', '2015-06-06 16:57:08', 1, '2015-06-06 16:57:08', 1, 0),
(8, 'Other course', '2015-06-06 16:57:23', 1, '2015-06-06 16:57:23', 1, 0),
(9, '', '2015-06-08 10:54:06', 1, '2015-06-15 16:29:13', 1, 9),
(10, 'Progrmmings', '2015-06-14 15:57:32', 1, '2015-06-28 10:28:51', 1, 1),
(11, 'New CategoryTwo', '2015-07-19 18:22:52', 1, '2015-09-14 15:40:39', 1, 1),
(12, 'New Categorys', '2015-08-10 14:21:26', 1, '2016-01-30 07:03:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE IF NOT EXISTS `coursedetails` (
  `Id` int(11) NOT NULL,
  `CourseCategoryId` int(11) NOT NULL,
  `CourseName` varchar(80) NOT NULL,
  `CourseDetails` varchar(2000) NOT NULL,
  `CoursePrice` float(10,2) NOT NULL,
  `CourseDuration` varchar(40) NOT NULL,
  `StartDate` date NOT NULL,
  `CourseTime` varchar(40) NOT NULL,
  `CourseSchedule` varchar(400) NOT NULL COMMENT 'Suppose sat, sun and mon in a week',
  `CreatedBy` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL DEFAULT '0',
  `BatchNo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`Id`, `CourseCategoryId`, `CourseName`, `CourseDetails`, `CoursePrice`, `CourseDuration`, `StartDate`, `CourseTime`, `CourseSchedule`, `CreatedBy`, `CreationDate`, `ModifiedBy`, `ModifyDate`, `Status`, `BatchNo`) VALUES
(1, 1, 'ASP.NET ', './files/course/911433610185.txt', 14000.00, '180 Hours', '2015-06-19', '11:00 AM', 'Day', 1, '2015-06-06 17:03:05', 1, '2015-06-06 17:03:05', 0, '1st'),
(2, 1, 'Codigniter', './files/course/9271433610387.txt', 15000.00, '190 hours ', '2015-06-20', '11:00 AM', 'Day', 1, '2015-06-06 17:06:27', 1, '2015-06-06 17:06:27', 0, '1'),
(3, 1, 'Object Oriented Programming  Using ASP.NET', './files/course/4141433610555.txt', 20000.00, '150 Hours', '2015-06-21', '7:00 AM', '', 1, '2015-06-06 17:09:15', 1, '2015-06-06 17:09:15', 0, '1st'),
(4, 2, 'iPhone Application Development', './files/course/4471433610772.txt', 20000.00, '120 Hours', '2015-06-22', '7:00 AM', 'Night', 1, '2015-06-06 17:12:52', 1, '2015-06-06 17:12:52', 0, '1st'),
(5, 5, 'Networking ', './files/course/8401433610976.txt', 20000.00, '110 Hours', '2015-06-23', '11:00 AM', '', 1, '2015-06-06 17:16:16', 1, '2015-06-06 17:16:16', 0, '1st'),
(6, 4, 'Microsoft Windows Azure Training & Certification', './files/course/6211433611092.txt', 20000.00, '160 Hours', '2015-06-24', '11:00 AM', 'Day', 1, '2015-06-06 17:18:12', 1, '2015-06-06 17:18:12', 0, '2nd'),
(7, 7, 'Cloud Computing Training ', './files/course/2441433611195.txt', 15000.00, '150 Hours', '2015-06-25', '11:00 AM', 'Day', 1, '2015-06-06 17:19:55', 1, '2015-06-06 17:19:55', 0, '3rd'),
(8, 10, 'Certified Ethical Hacker Information Security Training & Certification', './files/course/4531438252080.txt', 20000.00, '100 Hours', '2015-06-26', '11:00 AM', 'Day', 1, '2015-06-06 17:21:42', 1, '2015-07-30 10:28:00', 1, '5th'),
(9, 3, 'Microsoft Visio Training New Horizons', './files/course/8861433611397.txt', 25000.00, '100 Hours', '2015-06-27', '1:00 PM', '', 1, '2015-06-06 17:23:17', 1, '2015-06-06 17:23:17', 0, '7th'),
(10, 7, 'Cloud Computing Training', './files/course/3241434293210.txt', 21000.00, '130 Hours', '2015-06-28', '5:00 PM', 'Night', 1, '2015-06-06 17:25:58', 1, '2015-06-14 14:46:50', 1, '8th'),
(11, 5, 'Codigniter New Batch', './files/course/4461437930989.txt', 12000.00, '4 months', '2015-07-28', '11:15 PM', 'Sat, Sun, Mon', 1, '2015-07-26 17:16:29', 1, '2015-07-26 17:16:29', 0, 'B-004'),
(12, 10, 'Cloud Computing Trainings', './files/course/2181438252045.txt', 12000.00, '12 months', '2015-08-08', '4:25 PM', 'Sat, Sun, Mon', 1, '2015-07-30 10:27:25', 1, '2015-07-30 10:27:25', 0, 'B-002'),
(13, 1, 'iPhone Application Development', './files/course/9821441352913.txt', 12000.00, '4 Months', '2015-09-24', '1:50 PM', 'Sat, Sun, Mon', 1, '2015-09-04 07:48:33', 1, '2015-09-04 07:48:33', 0, 'B-004'),
(14, 10, 'Object Oriented Programming  Using ASP.NET New', './files/course/5621442245421.txt', 10000.00, '4 Months', '2015-09-30', '10:00 AM', 'Sat, Sun, Mon', 1, '2015-09-14 15:43:41', 1, '2015-09-14 15:43:41', 0, 'B-0001');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE IF NOT EXISTS `courseregistration` (
  `Id` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `RegistrationDate` date NOT NULL,
  `PaidAmount` float(10,2) NOT NULL DEFAULT '0.00',
  `PaybleAmount` float(10,2) NOT NULL DEFAULT '0.00',
  `PaymentDate` date NOT NULL,
  `DuePaymentDate` varchar(18) NOT NULL,
  `Discount` int(11) NOT NULL DEFAULT '0',
  `CreatedBy` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`Id`, `StudentId`, `CourseId`, `RegistrationDate`, `PaidAmount`, `PaybleAmount`, `PaymentDate`, `DuePaymentDate`, `Discount`, `CreatedBy`, `CreationDate`, `ModifiedBy`, `ModifyDate`, `Status`) VALUES
(1, 8, 10, '2015-06-07', 17000.00, 3580.00, '2015-06-13', '2015-06-24', 2, 1, '2015-06-06 17:46:55', 1, '2015-06-06 17:46:55', 0),
(2, 7, 9, '2015-06-06', 24000.00, 0.00, '2015-06-13', '2015-06-24', 4, 1, '2015-06-06 17:47:58', 1, '2015-06-06 17:47:58', 0),
(3, 6, 7, '2015-06-12', 20000.00, -5900.00, '2015-06-12', '2015-07-18', 6, 1, '2015-06-06 17:49:26', 1, '2015-06-06 17:49:26', 0),
(4, 5, 6, '2015-06-13', 15000.00, 3800.00, '2015-06-13', '2015-07-23', 6, 1, '2015-06-06 17:50:30', 1, '2015-06-06 17:50:30', 0),
(5, 4, 7, '2015-06-14', 11000.00, 2500.00, '2015-06-14', '2015-07-24', 10, 1, '2015-06-06 17:51:11', 1, '2015-06-06 17:51:11', 0),
(6, 3, 4, '2015-06-15', 20000.00, -600.00, '2015-06-15', '2015-07-15', 3, 1, '2015-06-06 17:51:54', 1, '2015-06-06 17:51:54', 0),
(7, 2, 3, '2015-06-15', 12000.00, 5200.00, '2015-06-16', '2015-07-26', 14, 1, '2015-06-06 17:52:53', 1, '2015-06-06 17:52:53', 0),
(8, 1, 2, '2015-06-17', 13000.00, 1250.00, '2015-06-17', '2015-07-30', 5, 1, '2015-06-06 17:53:41', 1, '2015-06-06 17:53:41', 0),
(9, 5, 10, '2015-06-12', 2000.00, 16900.00, '2015-06-14', '2015-06-14', 10, 1, '2015-06-14 14:50:13', 1, '2015-06-14 14:50:13', 0),
(10, 7, 5, '2015-06-22', 12000.00, 6000.00, '2015-06-24', '2015-06-24', 10, 1, '2015-06-24 08:49:59', 1, '2015-06-24 08:49:59', 0),
(11, 7, 11, '2015-07-26', 4000.00, 6800.00, '2015-07-26', '2015-07-26', 10, 1, '2015-07-26 17:18:30', 1, '2015-07-26 17:18:30', 0),
(12, 8, 11, '2015-09-04', 8000.00, 2800.00, '2015-09-04', '2015-09-04', 10, 1, '2015-09-04 07:50:23', 1, '2015-09-04 07:50:23', 0),
(13, 8, 14, '2015-09-08', 8000.00, 1000.00, '2015-09-14', '2015-09-14', 10, 1, '2015-09-14 15:45:23', 1, '2015-09-14 15:45:46', 9),
(14, 8, 14, '2015-09-06', 8000.00, 1000.00, '2015-09-14', '2015-09-14', 10, 1, '2015-09-14 15:46:28', 1, '2015-09-14 15:46:28', 0),
(15, 9, 12, '2016-01-28', 10000.00, 1280.00, '2016-01-30', '2016-02-19', 6, 1, '2016-01-30 07:06:35', 1, '2016-02-19 14:40:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courseteacher`
--

CREATE TABLE IF NOT EXISTS `courseteacher` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(80) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `ContactNumber` varchar(14) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `InterestedArea` varchar(400) NOT NULL,
  `Designation` varchar(60) NOT NULL,
  `AcademicDescription` varchar(400) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `JoinDate` date NOT NULL,
  `EmployementStatus` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Picture` varchar(60) NOT NULL,
  `Status` int(11) NOT NULL,
  `UserType` int(11) NOT NULL,
  `Salary` float(10,2) NOT NULL,
  `Gender` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseteacher`
--

INSERT INTO `courseteacher` (`Id`, `FullName`, `Address`, `ContactNumber`, `Email`, `InterestedArea`, `Designation`, `AcademicDescription`, `Message`, `JoinDate`, `EmployementStatus`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Picture`, `Status`, `UserType`, `Salary`, `Gender`) VALUES
(1, 'MD. Farhan', 'Dhaka, BD', '01818442288', 'farhan@gmai.com`', 'Nothing', 'Trainer', 'None', 'None', '2015-06-08', 0, '2015-06-14 14:56:20', 1, '2016-01-30 07:07:52', 1, 'uploads/images/teacher_images/1454137672icon.png', 1, 1, 18000.00, 'm'),
(2, 'MD. Majed', 'Dhaka, BD', '01822883388', 'majed@gmail.com', 'Programming', 'Computer Programmer', 'Not Mentioned', 'None', '2015-09-01', 0, '2015-09-14 15:49:51', 1, '2015-09-14 15:49:51', 1, 'uploads/images/teacher_images/1442245791zeev.jpg', 0, 1, 20000.00, 'm'),
(3, 'Delwar', 'Dhaka', '01677561447', 'delwaralam@gmail.com', 'no', 'no', 'no', '', '2015-09-08', 0, '2015-09-14 16:28:56', 1, '2015-09-14 16:29:25', 1, 'uploads/images/teacher_images/1442248136hello.php', 9, 2, 120000.00, 'm'),
(4, 'Delwar Alam', 'Dhaka', '01677561447', 'delwaralam@gmail.com', 'dhaka', 'no', 'no', '', '2015-09-09', 0, '2015-09-14 16:34:31', 1, '2015-09-14 16:36:34', 1, 'uploads/images/teacher_images/14422484713ca.php', 9, 2, 12000.00, 'm'),
(5, 'Delwar Alam', 'dhaka', '01677561447', 'delwaralam@gmail.com', 'delwa', 'delwar', 'no', '', '2015-09-08', 0, '2015-09-14 16:38:44', 1, '2015-09-14 16:38:44', 1, 'uploads/images/teacher_images/14422487243ca.php', 0, 2, 12000.00, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `employeesalary`
--

CREATE TABLE IF NOT EXISTS `employeesalary` (
  `Id` int(11) NOT NULL,
  `CurrentSalary` float(10,2) NOT NULL,
  `PaidSalary` float(10,2) NOT NULL,
  `EmployeeId` int(11) NOT NULL,
  `SalaryDate` date NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `ModifiedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeesalary`
--

INSERT INTO `employeesalary` (`Id`, `CurrentSalary`, `PaidSalary`, `EmployeeId`, `SalaryDate`, `CreatedBy`, `ModifiedBy`, `ModifyDate`) VALUES
(1, 18000.00, 18000.00, 1, '2015-06-24', 1, 1, '2015-06-24 08:51:29'),
(2, 18000.00, 18000.00, 1, '2015-07-26', 1, 1, '2015-07-26 17:21:29'),
(3, 18000.00, 18000.00, 1, '2015-08-11', 1, 1, '2015-08-11 12:43:56'),
(4, 18000.00, 18000.00, 1, '2015-09-04', 1, 1, '2015-09-04 07:52:12'),
(5, 20000.00, 20000.00, 2, '2015-09-14', 1, 1, '2015-09-14 15:51:51'),
(6, 12000.00, 12000.00, 5, '2016-01-30', 1, 1, '2016-01-30 07:13:34'),
(7, 0.00, 0.00, 4, '2016-01-30', 1, 1, '2016-01-30 07:13:34'),
(8, 0.00, 0.00, 3, '2016-01-30', 1, 1, '2016-01-30 07:13:34'),
(9, 20000.00, 20000.00, 2, '2016-01-30', 1, 1, '2016-01-30 07:13:34'),
(10, 18000.00, 18000.00, 1, '2016-01-30', 1, 1, '2016-01-30 07:13:34'),
(11, 12000.00, 12000.00, 5, '2016-02-19', 1, 1, '2016-02-19 14:41:29'),
(12, 0.00, 0.00, 4, '2016-02-19', 1, 1, '2016-02-19 14:41:29'),
(13, 0.00, 0.00, 3, '2016-02-19', 1, 1, '2016-02-19 14:41:29'),
(14, 20000.00, 20000.00, 2, '2016-02-19', 1, 1, '2016-02-19 14:41:29'),
(15, 18000.00, 18000.00, 1, '2016-02-19', 1, 1, '2016-02-19 14:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `expensecategory`
--

CREATE TABLE IF NOT EXISTS `expensecategory` (
  `Id` int(11) NOT NULL,
  `ExpenseCategoryName` varchar(80) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensecategory`
--

INSERT INTO `expensecategory` (`Id`, `ExpenseCategoryName`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Status`) VALUES
(1, 'Office Accessories', '2015-06-14 14:57:10', 1, '2015-07-26 17:20:11', 1, 1),
(2, 'Temporary Expense', '2015-07-26 17:20:19', 1, '2015-07-26 17:20:19', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expensedetails`
--

CREATE TABLE IF NOT EXISTS `expensedetails` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `ExpenseTitle` varchar(200) NOT NULL,
  `ExpenseDescription` varchar(400) NOT NULL,
  `ExpenseMoney` float(10,2) NOT NULL,
  `ExpenseCategoryId` int(11) NOT NULL,
  `ExpenseDate` date NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensedetails`
--

INSERT INTO `expensedetails` (`Id`, `ExpenseTitle`, `ExpenseDescription`, `ExpenseMoney`, `ExpenseCategoryId`, `ExpenseDate`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Status`) VALUES
(1, 'New Expense', '', 6000.00, 2, '2015-07-26', '2015-07-26 17:21:02', 1, '2015-07-26 17:21:02', 1, 0),
(2, 'Majed Taka Niye Chole Geche', 'Choto vai hisebe niye geche', 4000.00, 2, '2015-09-14', '2015-09-14 15:51:07', 1, '2015-09-14 15:51:07', 1, 0),
(3, 'New Exp', 'none', 2000.00, 2, '2016-01-30', '2016-01-30 07:12:33', 1, '2016-01-30 07:12:33', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incomecategory`
--

CREATE TABLE IF NOT EXISTS `incomecategory` (
  `Id` int(11) NOT NULL,
  `IncomeCategoryName` varchar(80) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomecategory`
--

INSERT INTO `incomecategory` (`Id`, `IncomeCategoryName`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Status`) VALUES
(1, 'Donation', '2015-09-04 07:51:47', 1, '2015-09-04 07:51:47', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `incomedetails`
--

CREATE TABLE IF NOT EXISTS `incomedetails` (
  `Id` int(11) NOT NULL DEFAULT '0',
  `IncomeTitle` varchar(200) NOT NULL,
  `IncomeDescription` varchar(400) NOT NULL,
  `IncomeMoney` float(10,2) NOT NULL,
  `IncomeCategoryId` int(11) NOT NULL,
  `IncomeDate` date NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomedetails`
--

INSERT INTO `incomedetails` (`Id`, `IncomeTitle`, `IncomeDescription`, `IncomeMoney`, `IncomeCategoryId`, `IncomeDate`, `CreationDate`, `CreatedBy`, `ModifyDate`, `ModifiedBy`, `Status`) VALUES
(1, 'Donation', 'None', 12000.00, 1, '2015-09-04', '2015-09-04 07:54:44', 1, '2015-09-04 07:54:44', 1, 0),
(2, 'Donation ', 'None', 4000.00, 1, '2015-09-15', '2015-09-14 15:51:33', 1, '2015-09-14 15:51:33', 1, 0),
(3, 'New Donation from Sarowar', 'For improvement', 20000.00, 1, '2016-01-30', '2016-01-30 07:13:16', 1, '2016-01-30 07:13:16', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `Address` varchar(400) NOT NULL,
  `AcademicDescription` varchar(400) NOT NULL,
  `StudentId` varchar(40) NOT NULL,
  `JoinDate` date NOT NULL,
  `OtherInfo` varchar(2000) NOT NULL,
  `Contact` varchar(14) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Picture` varchar(60) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedBy` int(11) NOT NULL,
  `ModifyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Id`, `FullName`, `Address`, `AcademicDescription`, `StudentId`, `JoinDate`, `OtherInfo`, `Contact`, `Email`, `Picture`, `CreatedBy`, `CreationDate`, `ModifiedBy`, `ModifyDate`, `Status`) VALUES
(1, 'Sajib Ahmed', 'Dhaka, Panthopath Bangladesh', 'Daffodil International University ', '150101', '2015-06-07', 'Comilla Bangladesh ', '01938123456', 'sajib@gmail.com', 'uploads/images/student_images/1433611693sakib3.jpg', 1, '2015-06-06 17:28:13', 1, '2015-06-06 17:28:13', 0),
(2, 'Sakib Ahmed', 'Dhanmondi 32 Dhaka Bangladesh', 'Dhaka University ', '15002', '2015-06-08', 'Rangamati, Bangladesh ', '01932456789', 'sakib@gmail.com', 'uploads/images/student_images/1433611816sakib5.jpg', 1, '2015-06-06 17:30:16', 1, '2015-06-06 17:30:16', 0),
(3, 'Sujon Ahmed ', 'Kolabagan Dhanmondi Bangladesh', 'Chittagong University ', '150112', '2015-06-09', 'Chandgao ', '01934567890', 'sujon@gmail.com', 'uploads/images/student_images/1433611958sakib12.jpg', 1, '2015-06-06 17:32:38', 1, '2015-06-06 17:32:38', 0),
(4, 'Sabbir Ahmed Khan ', 'WestRazabazar', 'Jaggannath University ', '15010101', '2015-06-18', 'Munsigong Bangladesh', '01783415678', 'sabbirkhan@gmail.com', 'uploads/images/student_images/1433612157sakib6.jpg', 1, '2015-06-06 17:35:57', 1, '2015-06-06 17:35:57', 0),
(5, 'Evan', 'Comilla Bangladesh ', 'Daffodil International University  ', '15135', '2015-06-12', 'Comilla ', '01938161058', 'evan@gmail.com', 'uploads/images/student_images/1433612257kjbljb.jpg', 1, '2015-06-06 17:37:37', 1, '2015-06-06 17:37:37', 0),
(6, 'Fakhrul Ahmed ', 'Dhanmondi Bangladesh', 'Daffodil International University ', '15351', '2015-06-13', 'Chittagong Bangladesh', '01734567891', 'ahmnedfakhrul@gmail.com', 'uploads/images/student_images/1433612379sakib8.jpg', 1, '2015-06-06 17:39:39', 1, '2015-06-06 17:39:39', 0),
(7, 'Shariful Islam ', 'Mirpur 1', 'Daffodil International University', '150781', '2015-06-14', 'Khulna', '01987654311', 'sharif@gmail.com', 'uploads/images/student_images/1433612484sakib11.jpg', 1, '2015-06-06 17:41:24', 1, '2015-06-06 17:41:24', 0),
(8, 'Arif', 'Dhaka Motijil', 'American International University Bangladesh ', '1513567', '2015-06-15', 'Comilla ', '019675155111', 'arif@gmail.com', 'uploads/images/student_images/1433612625sakib7.jpg', 1, '2015-06-06 17:43:45', 1, '2015-06-06 17:43:45', 0),
(9, 'Mr. X', 'Dhaka, BD', 'Nothing', '34938', '2015-12-20', 'None', '01818282828', 'mrx@gmail.com', 'uploads/images/student_images/1454137521logo.png', 1, '2015-12-19 18:14:01', 1, '2016-01-30 07:05:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `UserType` varchar(40) NOT NULL,
  `ProfilePicture` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `FullName`, `UserName`, `Password`, `UserType`, `ProfilePicture`) VALUES
(1, 'Farhad', 'farhad', '12', 'a', ''),
(2, 'Shoriful Islam', 'shorif', '12', 'a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignteachertoclass`
--
ALTER TABLE `assignteachertoclass`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_assignteachertoclass_CreatedBy` (`CreatedBy`), ADD KEY `FK_assignteachertoclass_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `coursecategory`
--
ALTER TABLE `coursecategory`
  ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `CategoryName` (`CategoryName`), ADD KEY `FK_CreatedBy` (`CreatedBy`), ADD KEY `FK_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`Id`), ADD KEY `Fk_CourseDetails_CreatedBy` (`CreatedBy`), ADD KEY `Fk_CourseDetails_ModifiedBy` (`ModifiedBy`), ADD KEY `CourseCategoryId` (`CourseCategoryId`);

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`Id`), ADD KEY `Fk_CourseRegistration_CreatedBy` (`CreatedBy`), ADD KEY `Fk_CourseRegistration_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `courseteacher`
--
ALTER TABLE `courseteacher`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_CourseTeacher_CreatedBy` (`CreatedBy`), ADD KEY `FK_CourseTeacher_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `employeesalary`
--
ALTER TABLE `employeesalary`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_employeesalary_EmployeeId` (`EmployeeId`), ADD KEY `FK_employeesalary_CreatedBy` (`CreatedBy`), ADD KEY `FK_employeesalary_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `expensecategory`
--
ALTER TABLE `expensecategory`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_ExpenseCategory_CreatedBy` (`CreatedBy`), ADD KEY `FK_ExpenseCategory_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `expensedetails`
--
ALTER TABLE `expensedetails`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_ExpenseDetails_CreatedBy` (`CreatedBy`), ADD KEY `FK_ExpenseDetails_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `incomecategory`
--
ALTER TABLE `incomecategory`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_IncomeCategory_CreatedBy` (`CreatedBy`), ADD KEY `FK_IncomeCategory_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `incomedetails`
--
ALTER TABLE `incomedetails`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_IncomeDetails_IncomeCategoryId` (`IncomeCategoryId`), ADD KEY `FK_IncomeDetails_CreatedBy` (`CreatedBy`), ADD KEY `FK_IncomeDetails_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Id`), ADD KEY `FK_Student_CreatedBy` (`CreatedBy`), ADD KEY `Fk_Student_ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`), ADD UNIQUE KEY `UK_User_UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courseregistration`
--
ALTER TABLE `courseregistration`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignteachertoclass`
--
ALTER TABLE `assignteachertoclass`
ADD CONSTRAINT `FK_assignteachertoclass_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_assignteachertoclass_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `coursecategory`
--
ALTER TABLE `coursecategory`
ADD CONSTRAINT `FK_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `coursedetails`
--
ALTER TABLE `coursedetails`
ADD CONSTRAINT `Fk_CourseDetails_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `Fk_CourseDetails_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `coursedetails_ibfk_1` FOREIGN KEY (`CourseCategoryId`) REFERENCES `coursecategory` (`Id`);

--
-- Constraints for table `courseregistration`
--
ALTER TABLE `courseregistration`
ADD CONSTRAINT `Fk_CourseRegistration_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `Fk_CourseRegistration_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `courseteacher`
--
ALTER TABLE `courseteacher`
ADD CONSTRAINT `FK_CourseTeacher_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_CourseTeacher_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `employeesalary`
--
ALTER TABLE `employeesalary`
ADD CONSTRAINT `FK_employeesalary_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_employeesalary_EmployeeId` FOREIGN KEY (`EmployeeId`) REFERENCES `courseteacher` (`Id`),
ADD CONSTRAINT `FK_employeesalary_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `expensecategory`
--
ALTER TABLE `expensecategory`
ADD CONSTRAINT `FK_ExpenseCategory_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_ExpenseCategory_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `expensedetails`
--
ALTER TABLE `expensedetails`
ADD CONSTRAINT `FK_ExpenseDetails_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_ExpenseDetails_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `incomecategory`
--
ALTER TABLE `incomecategory`
ADD CONSTRAINT `FK_IncomeCategory_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_IncomeCategory_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `incomedetails`
--
ALTER TABLE `incomedetails`
ADD CONSTRAINT `FK_IncomeDetails_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `FK_IncomeDetails_IncomeCategoryId` FOREIGN KEY (`IncomeCategoryId`) REFERENCES `incomecategory` (`Id`),
ADD CONSTRAINT `FK_IncomeDetails_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
ADD CONSTRAINT `FK_Student_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`),
ADD CONSTRAINT `Fk_Student_ModifiedBy` FOREIGN KEY (`ModifiedBy`) REFERENCES `user` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
