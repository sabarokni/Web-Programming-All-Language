using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.ComponentModel.DataAnnotations;
using Microsoft.AspNetCore.Http;
using System.ComponentModel.DataAnnotations.Schema;
using Microsoft.AspNetCore.Http.Extensions;
using System.Xml;
using System.Xml.Schema;
using System.Xml.Serialization;
using System.IO;


namespace Lab3.Models
{
    public class RestaurantEditViewModel
    {
        public int Id { get; set; }
        [Display(Name = "Restaurant Name")]
        public string Name { get; set; }

        [Required]
        [Display(Name = "Street Address")]
        public string StreetAddress { get; set; }
        [Required]
        [Display(Name = "City")]
        public string City { get; set; }
        [Display(Name = "Province")]
        public ProvinceType ProvinceState { get; set; }
        [Required]
        [RegularExpression(@"^[a-zA-Z]\d[a-zA-Z](\s)*\d[a-zA-Z]\d$",
                ErrorMessage = "Must be in the form of A1A 1A1")]
        [Display(Name = "Postal Code")]
        public string PostalZipCode { get; set; }
        [Required]
        [Display(Name = "Summary")]
        public string Summary { get; set; }
        [Required]
        [Range(1, 5)]
        //[RegularExpression(@"^.{1,5}$", ErrorMessage = "Rating should be of minimum 1 and maximum 5.")]
        [Display(Name = "Rating (1 to 5)")]
        public decimal Rating { get; set; }
    }
}
