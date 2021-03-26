using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using Microsoft.AspNetCore.Http;

namespace XMLValidator.Models
{
    public class XmlValidationError
    {
        [Display(Name = "XML Element")]
        public string Element { get; set; }
        [Display(Name = "Error Type")]
        public string ErrorType { get; set; }
        [Display(Name = "Line Number")]
        public int Line { get; set; }
        [Display(Name = "Column Number")]

        public int Column { get; set; }
        [Display(Name = "Error Message")]
        public string Message { get; set; }
    }
}
