//------------------------------------------------------------------------------
// <auto-generated>
//     This code was generated by a tool.
//     Runtime Version:4.0.30319.42000
//
//     Changes to this file may cause incorrect behavior and will be lost if
//     the code is regenerated.
// </auto-generated>
//------------------------------------------------------------------------------

using System.Xml.Serialization;

// 
// This source code was auto-generated by xsd, Version=4.6.1055.0.
// 


/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
[System.Xml.Serialization.XmlRootAttribute(Namespace="www.algonquincollege.com/onlineservice/reviews", IsNullable=false)]
public partial class restaurants {
    
    private restaurantsRestaurant[] restaurantField;
    
    /// <remarks/>
    [System.Xml.Serialization.XmlElementAttribute("restaurant")]
    public restaurantsRestaurant[] restaurant {
        get {
            return this.restaurantField;
        }
        set {
            this.restaurantField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurant {
    
    private string nameField;
    
    private string logoField;
    
    private restaurantsRestaurantImage imageField;
    
    private restaurantsRestaurantAddress addressField;
    
    private restaurantsRestaurantPhone phoneField;
    
    private string summaryField;
    
    private restaurantsRestaurantDate dateField;
    
    private string reviewerField;
    
    private restaurantsRestaurantRating ratingField;
    
    private restaurantsRestaurantItem[] menuField;
    
    /// <remarks/>
    public string name {
        get {
            return this.nameField;
        }
        set {
            this.nameField = value;
        }
    }
    
    /// <remarks/>
    public string logo {
        get {
            return this.logoField;
        }
        set {
            this.logoField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantImage image {
        get {
            return this.imageField;
        }
        set {
            this.imageField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantAddress address {
        get {
            return this.addressField;
        }
        set {
            this.addressField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantPhone phone {
        get {
            return this.phoneField;
        }
        set {
            this.phoneField = value;
        }
    }
    
    /// <remarks/>
    public string summary {
        get {
            return this.summaryField;
        }
        set {
            this.summaryField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantDate date {
        get {
            return this.dateField;
        }
        set {
            this.dateField = value;
        }
    }
    
    /// <remarks/>
    public string reviewer {
        get {
            return this.reviewerField;
        }
        set {
            this.reviewerField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantRating rating {
        get {
            return this.ratingField;
        }
        set {
            this.ratingField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlArrayItemAttribute("item", IsNullable=false)]
    public restaurantsRestaurantItem[] menu {
        get {
            return this.menuField;
        }
        set {
            this.menuField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantImage {
    
    private string imageNameField;
    
    private restaurantsRestaurantImageImageSize imageSizeField;
    
    /// <remarks/>
    public string imageName {
        get {
            return this.imageNameField;
        }
        set {
            this.imageNameField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantImageImageSize imageSize {
        get {
            return this.imageSizeField;
        }
        set {
            this.imageSizeField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantImageImageSize {
    
    private byte widthField;
    
    private byte heightField;
    
    private string dimensionField;
    
    /// <remarks/>
    public byte width {
        get {
            return this.widthField;
        }
        set {
            this.widthField = value;
        }
    }
    
    /// <remarks/>
    public byte height {
        get {
            return this.heightField;
        }
        set {
            this.heightField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public string dimension {
        get {
            return this.dimensionField;
        }
        set {
            this.dimensionField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantAddress {
    
    private string streetField;
    
    private string cityField;
    
    private string provinceField;
    
    private string postalCodeField;
    
    /// <remarks/>
    public string street {
        get {
            return this.streetField;
        }
        set {
            this.streetField = value;
        }
    }
    
    /// <remarks/>
    public string city {
        get {
            return this.cityField;
        }
        set {
            this.cityField = value;
        }
    }
    
    /// <remarks/>
    public string province {
        get {
            return this.provinceField;
        }
        set {
            this.provinceField = value;
        }
    }
    
    /// <remarks/>
    public string postalCode {
        get {
            return this.postalCodeField;
        }
        set {
            this.postalCodeField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantPhone {
    
    private ushort areaCodeField;
    
    private string numberField;
    
    /// <remarks/>
    public ushort areaCode {
        get {
            return this.areaCodeField;
        }
        set {
            this.areaCodeField = value;
        }
    }
    
    /// <remarks/>
    public string number {
        get {
            return this.numberField;
        }
        set {
            this.numberField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantDate {
    
    private byte dayField;
    
    private string monthField;
    
    private ushort yearField;
    
    /// <remarks/>
    public byte day {
        get {
            return this.dayField;
        }
        set {
            this.dayField = value;
        }
    }
    
    /// <remarks/>
    public string month {
        get {
            return this.monthField;
        }
        set {
            this.monthField = value;
        }
    }
    
    /// <remarks/>
    public ushort year {
        get {
            return this.yearField;
        }
        set {
            this.yearField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantRating {
    
    private string typeField;
    
    private byte max_valueField;
    
    private byte valueField;
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public string type {
        get {
            return this.typeField;
        }
        set {
            this.typeField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public byte max_value {
        get {
            return this.max_valueField;
        }
        set {
            this.max_valueField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlTextAttribute()]
    public byte Value {
        get {
            return this.valueField;
        }
        set {
            this.valueField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantItem {
    
    private string nameField;
    
    private restaurantsRestaurantItemBulk_price bulk_priceField;
    
    private restaurantsRestaurantItemPrice priceField;
    
    private string typeField;
    
    /// <remarks/>
    public string name {
        get {
            return this.nameField;
        }
        set {
            this.nameField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantItemBulk_price bulk_price {
        get {
            return this.bulk_priceField;
        }
        set {
            this.bulk_priceField = value;
        }
    }
    
    /// <remarks/>
    public restaurantsRestaurantItemPrice price {
        get {
            return this.priceField;
        }
        set {
            this.priceField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public string type {
        get {
            return this.typeField;
        }
        set {
            this.typeField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantItemBulk_price {
    
    private byte min_qtyField;
    
    private string currencyField;
    
    private decimal valueField;
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public byte min_qty {
        get {
            return this.min_qtyField;
        }
        set {
            this.min_qtyField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public string currency {
        get {
            return this.currencyField;
        }
        set {
            this.currencyField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlTextAttribute()]
    public decimal Value {
        get {
            return this.valueField;
        }
        set {
            this.valueField = value;
        }
    }
}

/// <remarks/>
[System.CodeDom.Compiler.GeneratedCodeAttribute("xsd", "4.6.1055.0")]
[System.SerializableAttribute()]
[System.Diagnostics.DebuggerStepThroughAttribute()]
[System.ComponentModel.DesignerCategoryAttribute("code")]
[System.Xml.Serialization.XmlTypeAttribute(AnonymousType=true, Namespace="www.algonquincollege.com/onlineservice/reviews")]
public partial class restaurantsRestaurantItemPrice {
    
    private string currencyField;
    
    private decimal valueField;
    
    /// <remarks/>
    [System.Xml.Serialization.XmlAttributeAttribute()]
    public string currency {
        get {
            return this.currencyField;
        }
        set {
            this.currencyField = value;
        }
    }
    
    /// <remarks/>
    [System.Xml.Serialization.XmlTextAttribute()]
    public decimal Value {
        get {
            return this.valueField;
        }
        set {
            this.valueField = value;
        }
    }
}