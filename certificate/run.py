import os
import cv2

def delete_old_data():
    for i in os.listdir("generated-certificates/"):
        os.remove("generated-certificates/{}".format(i))

def cleanup_data(file_path):
    list_of_names = []
    with open(file_path) as f:
        for line in f:
            list_of_names.append(line.strip())
    return list_of_names

def generate_certificates(names):
    for index, name in enumerate(names):
        certificate_template_image = cv2.imread("certificate-template.jpg")
        cv2.putText(certificate_template_image, name, (815,1500), cv2.FONT_HERSHEY_SIMPLEX, 5, (0, 0, 250), 5, cv2.LINE_AA)
        cv2.imwrite("generated-certificates/{}.jpg".format(name), certificate_template_image)
        print("Processing {} / {}".format(index + 1, len(names)))

def main(file_path):
    delete_old_data()
    names = cleanup_data(file_path)
    generate_certificates(names)

if __name__ == '__main__':
    import sys
    file_path = sys.argv[1]
    main(file_path)
