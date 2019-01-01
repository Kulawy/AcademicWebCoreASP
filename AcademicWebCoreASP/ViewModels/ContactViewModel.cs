using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace AcademicWebCoreASP.ViewModels
{
    public class ContactViewModel
    {
        [Required]
        [EmailAddress]
        public string Address { get; set; }

        [Required]
        [MinLength(3)]
        public string Fname { get; set; }

        [Required]
        [MinLength(3)]
        public string Lname { get; set; }

        [Required]
        [EmailAddress]
        public string Email { get; set; }

        [Required]
        [Phone]
        //[RegularExpression("/^\\([0-9]{3}\\) [0-9]{3}-[0-9]{4}$/")]
        [RegularExpression("^\\+?[0-9]{2}-?[0-9]{3}-?[0-9]{3}-?[0-9]{3}$", ErrorMessage = "Number is Wrong")]
        public string Phone { get; set; }

        [Required]
        [MaxLength(1000)]
        public string Message { get; set; }


    }
}
