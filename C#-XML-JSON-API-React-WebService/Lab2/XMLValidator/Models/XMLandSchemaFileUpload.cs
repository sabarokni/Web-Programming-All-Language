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

namespace XMLValidator.Models
{
    public class XMLandSchemaFileUpload
    {
        [Display(Name = "XML File")]
        public IFormFile XmlFile { get; set; }

        [Display(Name = "Schema File")]
        public IFormFile SchemaFile { get; set; }

    }
}
