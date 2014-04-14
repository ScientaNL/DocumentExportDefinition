DocumentExportDefinition
============================

Definition for Document Exporting used by both export clients and services as transport contract

These classes are used in Syslogic Projects as a lingua franca between The Scienta Application and servers dedicated to create exports of text based documents in formats such as DOCX or PDF. The classes are annotated with PHPDoc Annotations which can be parsed by a serializer, such as the JMS Serializer. This enables the classes to be transported as JSON and be deserialized back into the same classes.
