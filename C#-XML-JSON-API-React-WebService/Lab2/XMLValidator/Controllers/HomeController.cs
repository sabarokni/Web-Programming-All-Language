using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using XMLValidator.Models;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.AspNetCore.Http;
using System.Xml;
using System.Xml.Schema;
using System.Xml.Serialization;
using System.IO;
using System.ComponentModel.DataAnnotations;

namespace XMLValidator.Controllers
{
    public class HomeController : Controller
    {
        private readonly ILogger<HomeController> _logger;

       
        public HomeController(ILogger<HomeController> logger)
        {
            _logger = logger;
        }
        public async Task<IActionResult> Index()
        {
            return View();
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Index(XMLandSchemaFileUpload xmlAndSchemaFiles)
        {

            if (ModelState.IsValid)
            {
                IFormFile schemaFile = xmlAndSchemaFiles.SchemaFile;
                IFormFile xmlFile = xmlAndSchemaFiles.XmlFile;


                ViewData["XMLFILE"] = xmlFile.FileName;
                ViewData["SCHEMAFILE"] = schemaFile.FileName;

                XmlReaderSettings settings = new XmlReaderSettings();
                XmlReader schemaReader = XmlReader.Create(schemaFile.OpenReadStream());

                XmlSchemaSet sc = new XmlSchemaSet();
                sc.Add(null, schemaReader);


                settings.ValidationType = ValidationType.Schema;
                settings.Schemas = sc;


                List<XmlValidationError> validationResults = new List<XmlValidationError>();

                settings.ValidationEventHandler +=
                        (s, e) => validationResults.Add(new XmlValidationError
                        {
                            Element = ((XmlReader)s).Name,
                            ErrorType = e.Severity.ToString(),
                            Line = e.Exception.LineNumber,
                            Column = e.Exception.LinePosition,
                            Message = e.Message
                        });
                XmlReader xmlReader = XmlReader.Create(xmlFile.OpenReadStream(), settings);

                while (xmlReader.Read())
                { }
                //xmlReader.Close();
                return View("ValidationResult", validationResults);

           }
            //return View("ValidationResult", validationResults);
            return View();

        }

        public async Task<IActionResult> ValidationResult()
        {

            return View();
        }
        public IActionResult Privacy()
        {
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
