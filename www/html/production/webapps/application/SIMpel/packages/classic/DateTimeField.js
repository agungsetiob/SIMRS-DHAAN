Ext.define("Ext.ux.DateTimePicker",{extend:"Ext.picker.Date",alias:"widget.datetimepicker",requires:["Ext.picker.Date","Ext.slider.Single","Ext.form.field.Time","Ext.form.Label"],todayText:"Current Date",hourText:"Hour",minuteText:"Minutes",initEvents:function(){var f=this,e=Ext.Date,d=e.DAY;Ext.apply(f.keyNavConfig,{up:function(a){if(a.ctrlKey){if(a.shiftKey){f.minuteSlider.setValue(f.minuteSlider.getValue()+1)}else{f.showNextYear()}}else{if(a.shiftKey){f.hourSlider.setValue(f.hourSlider.getValue()+1)}else{f.update(e.add(f.activeDate,d,-7))}}},down:function(a){if(a.ctrlKey){if(a.shiftKey){f.minuteSlider.setValue(f.minuteSlider.getValue()-1)}else{f.showPrevYear()}}else{if(a.shiftKey){f.hourSlider.setValue(f.hourSlider.getValue()-1)}else{f.update(e.add(f.activeDate,d,7))}}}});f.callParent()},initComponent:function(){var c=this,d=c.value?new Date(c.value):new Date();d.setSeconds(0);c.timeFormat=~c.format.indexOf("h")?"h":"H";c.hourSlider=new Ext.slider.Single({fieldLabel:c.hourText,labelAlign:"top",labelSeparator:" ",padding:"0 0 10 17",focusable:false,value:0,minValue:0,maxValue:23,vertical:true,listeners:{change:c.changeTimeValue,scope:c}});c.minuteSlider=new Ext.slider.Single({fieldLabel:c.minuteText,labelAlign:"top",labelSeparator:" ",padding:"0 10 10 0",focusable:false,value:0,increment:1,minValue:0,maxValue:59,vertical:true,listeners:{change:c.changeTimeValue,scope:c}});c.callParent();c.setValue(new Date(d))},afterRender:function(){var c=this,d=c.el;c.timePicker=Ext.create("Ext.panel.Panel",{layout:{type:"hbox",align:"stretch"},border:false,defaults:{flex:1},width:130,floating:true,onMouseDown:function(a){a.preventDefault()},dockedItems:[{xtype:"toolbar",dock:"top",ui:"footer",items:["->",{xtype:"label",text:c.timeFormat=="h"?"12:00 AM":"00:00"},"->"]}],items:[c.hourSlider,c.minuteSlider]});c.callParent()},handleTabClick:function(b){this.handleDateClick(b,this.activeCell.firstChild,true)},getSelectedDate:function(r){var p=this,l=Ext.Date.clearTime(r,true).getTime(),k=p.cells,c=p.selectedCls,n=k.elements,o=n.length,m,q;k.removeCls(c);for(q=0;q<o;q++){m=n[q].firstChild;if(m.dateValue===l){return m}}return null},changeTimeValue:function(t,p,o){var m=this,l=m.timePicker.down("label"),r="",q=m.minuteSlider.getValue()<10?"0":"",s="",e=m.hourSlider.getValue(),n=new Date();if(m.timeFormat=="h"){s=m.hourSlider.getValue()<12?" AM":" PM";e=m.hourSlider.getValue()<13?e:e-12;e=e||"12"}r=e<10?"0":"";l.setText(r+e+":"+q+m.minuteSlider.getValue()+s);if(m.pickerField&&m.pickerField.getValue()){m.pickerField.setValue(new Date(m.pickerField.getValue().setHours(m.hourSlider.getValue(),m.minuteSlider.getValue())))}},onShow:function(){var b=this;b.showTimePicker();b.callParent()},showTimePicker:function(){var f=this,d=f.el,e=f.timePicker;Ext.defer(function(){var k=Ext.getBody(),l=k.getViewSize().width,b=(l<(d.getX()+d.getWidth()+140))?"tl":"tr",a=b=="tl"?-135:5,j,c;f.timePicker.setHeight(d.getHeight());f.timePicker.showBy(f,b,[a,0]);c=f.timePicker.down("toolbar").getEl();j=c.getStyle("background-color");if(j=="transparent"){c.setStyle("background-color",c.getStyle("border-color"))}},1)},onHide:function(){var b=this;b.timePicker.hide();b.callParent()},beforeDestroy:function(){var b=this;if(b.rendered){Ext.destroy(b.timePicker,b.minuteSlider,b.hourSlider)}b.callParent()},setValue:function(b){b.setSeconds(0);this.value=new Date(b);return this.update(this.value)},selectToday:function(){var f=this,e=f.todayBtn,d=f.handler;auxDate=new Date();if(e&&!e.disabled){f.setValue(new Date(auxDate.setSeconds(0)));f.fireEvent("select",f,f.value);if(d){d.call(f.scope||f,f,f.value)}f.onSelect()}return f},handleDateClick:function(l,e,m){var o=this,p=o.handler,j=o.timePicker.items.items[0].getValue(),n=o.timePicker.items.items[1].getValue(),k=new Date(e.dateValue);if(m!==true){l.stopEvent()}if(!o.disabled&&e.dateValue&&!Ext.fly(e.parentNode).hasCls(o.disabledCellCls)){o.doCancelFocus=o.focusOnSelect===false;k.setHours(j,n,0);o.setValue(new Date(k));delete o.doCancelFocus;o.fireEvent("select",o,o.value);if(p){p.call(o.scope||o,o,o.value)}o.onSelect()}},selectedUpdate:function(h){var g=this,e=Ext.Date.clearTime(h,true),f=(g.pickerField&&g.pickerField.getValue())||new Date();this.callParent([e]);if(f){Ext.defer(function(){g.hourSlider.setValue(f.getHours());g.minuteSlider.setValue(f.getMinutes())},10)}},fullUpdate:function(h){var g=this,e=Ext.Date.clearTime(h,true),f=(g.pickerField&&g.pickerField.getValue())||new Date();this.callParent([e]);if(f){Ext.defer(function(){g.hourSlider.setValue(f.getHours());g.minuteSlider.setValue(f.getMinutes())},10)}}});Ext.define("Ext.ux.DateTimeField",{extend:"Ext.form.field.Date",alias:"widget.datetimefield",requires:["Ext.ux.DateTimePicker"],format:"m/d/Y H:i",altFormats:"m/d/Y H:i:s|c",width:270,mimicBlur:function(f){var d=this,e=d.picker;if(!e||!f.within(e.el,false,true)&&!f.within(e.timePicker.el,false,true)){d.callParent(arguments)}},triggerBlur:function(){return false},collapseIf:function(f){var d=this,e=d.picker;if(e.timePicker&&!f.within(e.timePicker.el,false,true)){d.callParent([f])}},createPicker:function(){var d=this,c=Ext.String.format;return new Ext.ux.DateTimePicker({id:d.id+"-picker",pickerField:d,floating:true,preventRefocus:true,hidden:true,minDate:d.minValue,maxDate:d.maxValue,disabledDatesRE:d.disabledDatesRE,disabledDatesText:d.disabledDatesText,ariaDisabledDatesText:d.ariaDisabledDatesText,disabledDays:d.disabledDays,disabledDaysText:d.disabledDaysText,ariaDisabledDaysText:d.ariaDisabledDaysText,format:d.format,showToday:d.showToday,startDay:d.startDay,minText:c(d.minText,d.formatDate(d.minValue)),ariaMinText:c(d.ariaMinText,d.formatDate(d.minValue,d.ariaFormat)),maxText:c(d.maxText,d.formatDate(d.maxValue)),ariaMaxText:c(d.ariaMaxText,d.formatDate(d.maxValue,d.ariaFormat)),listeners:{scope:d,select:d.onSelect,tabout:d.onTabOut},keyNavConfig:{esc:function(){d.inputEl.focus();d.collapse()}}})},getRefItems:function(){var c=this,d=c.callParent();if(c.picker==undefined){c.picker=c.createPicker()}if(c.picker.timePicker){d.push(c.picker.timePicker)}return d}});