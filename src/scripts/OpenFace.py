from multiprocessing import Pool
from subprocess import call
from sys import argv
import os
def call_long_running_openCV(file_num):
    program_path = '~/Downloads/OpenFace/build/bin/FaceLandmarkImg -f'
    input_file_path='/home/shakti/PycharmProjects/shaktiisdude/80/'
    gen_file_name = '80'+'.'+str(file_num)+'.png'
    #print gen_file_name
    command = [program_path ,input_file_path, gen_file_name,' -ofdir ',input_file_path,'results/']
    str1 = ''.join(command)
    print str1
    #print command
    os.system(str1)
if __name__=='__main__':
    pool = Pool(processes=4)
    print pool.map(call_long_running_openCV,range(1,30))
